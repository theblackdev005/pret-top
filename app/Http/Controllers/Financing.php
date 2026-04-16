<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FinancingFormRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\Financing as FinancingMail;
use App\Mail\FinancingAcknowledgment;
use App\Mail\FinancingPreAccepted;
use App\Mail\FinancingCompletedAdmin;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Financing extends Controller
{
    public function create()
    {
        $countries = \App\Models\Countries::get();
        $currencies = \App\Models\Currencies::get();

        return view('pages.obtain-financing', compact('countries', 'currencies'));
    }

    public function store(FinancingFormRequest $request)
    {
        $financing = $request->get('financing');
        $email = $financing['email'] ?? null;

        $requestId = 'JEM-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -5));
        $financing['reference'] = $requestId;

        if ($email) {
            $files = Storage::disk('local')->files('loan_requests');

            foreach ($files as $file) {
                $content = Storage::disk('local')->get($file);
                $existing = json_decode($content, true);

                if (!$existing) {
                    continue;
                }

                $existingEmail = $existing['financing']['email'] ?? null;
                $createdAt = isset($existing['created_at']) ? strtotime($existing['created_at']) : null;

                if (
                    $existingEmail &&
                    strtolower($existingEmail) === strtolower($email) &&
                    $createdAt &&
                    (time() - $createdAt < 120)
                ) {
                    return redirect()->route('thankyou')->with([
                        'nom' => ucfirst(strtolower($financing['prenom'] ?? '')) . ' ' . ucfirst(strtolower($financing['nom'] ?? '')),
                        'montant' => $financing['montant_du_pret'] ?? '',
                        'duree' => $financing['duree_totale_du_pret'] ?? '',
                        'reference' => $requestId,
                    ]);
                }
            }
        }

        $geoCity = $request->input('financing.geo_city');
        $geoCountry = $request->input('financing.geo_country');
        $geoRegion = $request->input('financing.geo_region');

        $montant = floatval(str_replace([' ', ','], ['', '.'], $financing['montant_du_pret'] ?? 0));
        $duree = intval($financing['duree_totale_du_pret'] ?? 0);

        $taux_annuel = floatval(str_replace('%', '', TEAG));
        $taux_mensuel = $taux_annuel / 12 / 100;

        if ($montant > 0 && $duree > 0) {
            if ($taux_mensuel > 0) {
                $mensualite = $montant * ($taux_mensuel / (1 - pow(1 + $taux_mensuel, -$duree)));
            } else {
                $mensualite = $montant / $duree;
            }

            $mensualite = round($mensualite, 2);
            $montant_total = round($mensualite * $duree, 2);
        } else {
            $mensualite = 0;
            $montant_total = 0;
        }

        $financing['montant_total_a_rembourser'] = number_format($montant_total, 2, '.', ' ') . ' €';
        $financing['mensualite_estimee'] = number_format($mensualite, 2, '.', ' ') . ' €';
        $financing['taux_TEAG'] = TEAG;

        $normalize = fn($str) => mb_strtolower(trim(iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $str)));

        $userCity = $normalize($financing['adresse_ville'] ?? '');
        $apiCity = $normalize($geoCity ?? '');
        $userCountry = $normalize($financing['adresse_pays'] ?? '');
        $apiCountry = $normalize($geoCountry ?? '');

        $isLocationMatch = ($userCity && $apiCity && str_contains($apiCity, $userCity))
            || ($userCountry && $apiCountry && str_contains($apiCountry, $userCountry));

        $adresse_declaree = trim(($financing['adresse_complete'] ?? '') . ', ' . ($financing['adresse_pays'] ?? ''));
        $geo_detectee = trim(($geoCity ?? '') . ', ' . ($geoRegion ?? '') . ', ' . ($geoCountry ?? ''));

        $data = [
            'name' => ($financing['nom'] ?? '') . ' ' . ($financing['prenom'] ?? ''),
            'subject' => translate(329),
            'request_id' => $requestId,
            'adresse_declaree' => $adresse_declaree ?: 'Adresse non renseignée',
            'geo_detectee' => $geo_detectee ?: 'Localisation inconnue',
            'location_match' => $isLocationMatch,
            'financing' => $financing,
            'geo' => [
                'city' => $geoCity,
                'region' => $geoRegion,
                'country' => $geoCountry,
            ],
        ];

        $payload = [
            'request_id' => $requestId,
            'status' => 'pending',
            'created_at' => now()->toDateTimeString(),
            'language' => app()->getLocale(),
            'financing' => $financing,
            'geo' => [
                'city' => $geoCity,
                'region' => $geoRegion,
                'country' => $geoCountry,
            ],
            'mail_data' => $data,
        ];

        Storage::disk('local')->put(
            'loan_requests/' . $requestId . '.json',
            json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        );

        $pdf = Pdf::loadView('contracts.loan-contract', [
            'financing' => $financing,
        ]);

        $nomFichier = __('loan_contract_filename')
            . '-'
            . Str::slug(($financing['prenom'] ?? '') . ' ' . ($financing['nom'] ?? ''))
            . '-'
            . Str::slug($financing['montant_du_pret'] ?? 'montant')
            . '-eur-'
            . date('Ymd')
            . '.pdf';

        $this->sendMailWithRetry(
            (new FinancingMail($data))->attachData($pdf->output(), $nomFichier),
            SITE_EMAIL
        );

        if (!empty($financing['email'])) {
            $this->sendMailWithRetry(
                new FinancingAcknowledgment($data),
                $financing['email']
            );
        }

        return redirect()->route('thankyou')->with([
            'nom' => ucfirst(strtolower($financing['prenom'] ?? '')) . ' ' . ucfirst(strtolower($financing['nom'] ?? '')),
            'montant' => $financing['montant_du_pret'] ?? '',
            'duree' => $financing['duree_totale_du_pret'] ?? '',
            'reference' => $requestId,
        ]);
    }

    public function approve($requestId)
    {
        $relativePath = 'loan_requests/' . $requestId . '.json';
        $privatePath = storage_path('app/private/' . $relativePath);
        $classicPath = storage_path('app/' . $relativePath);

        if (file_exists($privatePath)) {
            $content = file_get_contents($privatePath);
            $savePath = $privatePath;
        } elseif (file_exists($classicPath)) {
            $content = file_get_contents($classicPath);
            $savePath = $classicPath;
        } else {
            return response('❌ Fichier introuvable : ' . $relativePath);
        }

        $payload = json_decode($content, true);

        $language = $payload['language'] ?? 'fr';
        app()->setLocale($language);

        if (!$payload || empty($payload['financing'])) {
            return response('❌ JSON invalide ou données manquantes');
        }

        if (($payload['status'] ?? null) === 'approved') {
            return response('✅ Déjà approuvé');
        }

        $financing = $payload['financing'];
        $financing['reference'] = $payload['request_id'] ?? $requestId;
        $mailData = $payload['mail_data'] ?? [];

        if (empty($financing['email'])) {
            return response('❌ Email client introuvable');
        }

        $mailData = array_merge([
            'name' => ($financing['prenom'] ?? '') . ' ' . ($financing['nom'] ?? ''),
            'subject' => 'Votre demande de financement a été acceptée',
            'adresse_declaree' => 'Adresse non renseignée',
            'geo_detectee' => 'Localisation inconnue',
            'location_match' => true,
            'financing' => $financing,
            'geo' => $payload['geo'] ?? [],
            'request_id' => $payload['request_id'] ?? $requestId,
        ], $mailData);

        $mailData['subject'] = __('loan_approved_subject');
        $mailData['financing'] = $financing;
        $mailData['approved_at'] = now()->toDateTimeString();

        $pdf = Pdf::loadView('contracts.loan-contract', [
            'financing' => $financing,
        ]);

        $nomFichier = __('loan_contract_filename')
            . '-'
            . Str::slug(($financing['prenom'] ?? '') . ' ' . ($financing['nom'] ?? ''))
            . '-'
            . Str::slug($financing['montant_du_pret'] ?? 'montant')
            . '-eur-'
            . date('Ymd')
            . '.pdf';

        $this->sendMailWithRetry(
            (new \App\Mail\LoanApproved($mailData))->attachData($pdf->output(), $nomFichier),
            $financing['email']
        );

        $payload['status'] = 'approved';
        $payload['approved_at'] = now()->toDateTimeString();

        file_put_contents(
            $savePath,
            json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        );

        return response('✅ CONTRAT ENVOYÉ AVEC SUCCÈS');
    }

    public function showCompleteFinancingForm(Request $request)
    {
        $reference = trim($request->get('reference', ''));
        $reference = ltrim($reference, '#');

        $loanRequest = null;
        $fullname = null;

        if ($reference) {
            $relativePath = 'loan_requests/' . $reference . '.json';

            if (Storage::disk('local')->exists($relativePath)) {
                $content = Storage::disk('local')->get($relativePath);
                $payload = json_decode($content, true);

                if ($payload && isset($payload['financing'])) {
                    $loanRequest = $payload;

                    $prenom = $payload['financing']['prenom'] ?? '';
                    $nom = $payload['financing']['nom'] ?? '';
                    $fullname = trim($prenom . ' ' . $nom);
                }
            }
        }

        return view('pages.complete_financing', [
            'reference' => $reference,
            'loanRequest' => $loanRequest,
            'fullname' => $fullname,
        ]);
    }

    public function completeFinancing(Request $request)
    {
        $request->validate([
            'reference' => ['required', 'string'],
            'fullname' => ['required', 'string', 'max:255'],
            'job' => ['required', 'string', 'max:255'],
            'income' => ['required', 'numeric', 'min:0'],
            'document_type' => ['required', 'in:id_card,passport'],
            'identity_front' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:5120'],
            'identity_back' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:5120'],
            'passport_file' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:5120'],
            'iban' => ['required', 'string', 'max:255'],
            'account_holder' => ['required', 'string', 'max:255'],
            'bank_name' => ['required', 'string', 'max:255'],
        ]);

        $reference = trim($request->reference);
        $reference = ltrim($reference, '#');

        $relativePath = 'loan_requests/' . $reference . '.json';

        if (!Storage::disk('local')->exists($relativePath)) {
            return redirect()->back()->with('error', 'Numéro de dossier introuvable.')->withInput();
        }

        $content = Storage::disk('local')->get($relativePath);
        $payload = json_decode($content, true);

        if (!$payload || !isset($payload['financing'])) {
            return redirect()->back()->with('error', 'Dossier invalide.')->withInput();
        }

        if ($request->document_type === 'id_card') {
            if (!$request->hasFile('identity_front') || !$request->hasFile('identity_back')) {
                return redirect()->back()->with('error', 'Veuillez joindre le recto et le verso de votre document d’identité.')->withInput();
            }
        }

        if ($request->document_type === 'passport') {
            if (!$request->hasFile('passport_file')) {
                return redirect()->back()->with('error', 'Veuillez joindre votre passeport.')->withInput();
            }
        }

        $identityFrontPath = $request->hasFile('identity_front')
            ? $request->file('identity_front')->store('loan_documents/identity_front', 'local')
            : null;

        $identityBackPath = $request->hasFile('identity_back')
            ? $request->file('identity_back')->store('loan_documents/identity_back', 'local')
            : null;

        $passportPath = $request->hasFile('passport_file')
            ? $request->file('passport_file')->store('loan_documents/passport', 'local')
            : null;

        $payload['additional_information'] = [
            'fullname' => $request->fullname,
            'job' => $request->job,
            'income' => $request->income,
            'document_type' => $request->document_type,
            'identity_front_path' => $identityFrontPath,
            'identity_back_path' => $identityBackPath,
            'passport_path' => $passportPath,
            'iban' => strtoupper(preg_replace('/\s+/', '', $request->iban)),
            'account_holder' => $request->account_holder,
            'bank_name' => $request->bank_name,
            'submitted_at' => now()->toDateTimeString(),
        ];

        $payload['status'] = 'pre_accepted_pending_contract';

        Storage::disk('local')->put(
            $relativePath,
            json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        );

        $financing = $payload['financing'];
        $financing['reference'] = $payload['request_id'] ?? $reference;

        $mailData = [
            'name' => trim(($financing['prenom'] ?? '') . ' ' . ($financing['nom'] ?? '')),
            'request_id' => $payload['request_id'] ?? $reference,
            'financing' => $financing,
        ];

        if (!empty($financing['email'])) {
            $this->sendMailWithRetry(
                new FinancingPreAccepted($mailData),
                $financing['email']
            );
        }

        $mailAdminData = [
            'request_id' => $payload['request_id'] ?? $reference,
            'fullname' => $request->fullname,
            'job' => $request->job,
            'income' => $request->income,
            'iban' => $request->iban,
            'account_holder' => $request->account_holder,
            'bank_name' => $request->bank_name,
            'document_type' => $request->document_type,
            'identity_front' => $identityFrontPath ?? null,
            'identity_back' => $identityBackPath ?? null,
            'passport' => $passportPath ?? null,
        ];

        $this->sendMailWithRetry(
            new FinancingCompletedAdmin($mailAdminData),
            SITE_EMAIL
        );

        return redirect()->route('site.complete_financing.success', [
            'language' => app()->getLocale(),
        ])->with([
            'request_id' => $payload['request_id'] ?? $reference,
            'fullname' => $request->fullname,
        ]);
    }

    private function sendMailWithRetry($mailable, $email, $maxAttempts = 3)
    {
        $attempt = 0;

        while ($attempt < $maxAttempts) {
            try {
                Mail::to($email)->send($mailable);
                return true;
            } catch (\Exception $e) {
                \Log::error("Mail attempt {$attempt} failed: " . $e->getMessage());
                $attempt++;
                sleep(2);
            }
        }

        return false;
    }
}