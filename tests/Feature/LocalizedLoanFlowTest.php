<?php

namespace Tests\Feature;

use App\Mail\FinancingPreAccepted;
use App\Mail\LoanApproved;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class LocalizedLoanFlowTest extends TestCase
{
    public function test_polish_complete_financing_redirect_keeps_reference(): void
    {
        $this->get('/pl/complete-financing?reference=JEM-TEST')
            ->assertRedirect('/pl/moj-wniosek?reference=JEM-TEST');
    }

    public function test_greek_complete_financing_redirect_keeps_reference(): void
    {
        $this->get('/el/complete-financing?reference=JEM-TEST')
            ->assertRedirect('/el/o-fakelos-mou?reference=JEM-TEST');
    }

    public function test_polish_thank_you_page_uses_polish_locale(): void
    {
        $this->withSession([
            'nom' => 'Anna',
            'montant' => '5000',
            'duree' => '24',
            'reference' => 'JEM-TEST',
        ])
            ->get('/pl/merci')
            ->assertOk()
            ->assertSee('Dziękujemy', false);
    }

    public function test_loan_form_uses_country_placeholder_and_editable_phone_prefixes(): void
    {
        $response = $this->get('/pl/obtain-financing');

        $response->assertOk()
            ->assertSee('id="address-country"', false)
            ->assertSee('Wybierz swój kraj', false)
            ->assertDontSee('value="Spain" selected', false)
            ->assertSee('id="phone-country-code"', false)
            ->assertSee('data-dial-code="+48"', false)
            ->assertSee('data-dial-code="+30"', false)
            ->assertSee(loan_processing_fee_for_locale('pl'), false)
            ->assertSee('data-loan-processing-fee', false)
            ->assertSee('name="fees_notice"', false)
            ->assertDontSee('Warunki finansowania', false)
            ->assertDontSee('(LOAN_PROCESSING_FEE)', false);
    }

    public function test_homepage_shows_financing_conditions_section(): void
    {
        $response = $this->get('/fr');

        $response->assertOk()
            ->assertSee('3 000 € à 150 000 €', false)
            ->assertSee('12 à 120 mois', false)
            ->assertSee('TAEG fixe', false)
            ->assertSee('à partir de 3,75 %', false)
            ->assertSee('Obtenir mon prêt', false)
            ->assertSee(loan_processing_fee_for_locale('fr'), false)
            ->assertDontSee('Demander un financement', false)
            ->assertDontSee('Déposer votre demande', false)
            ->assertDontSee('Recevoir une première réponse', false)
            ->assertDontSee('Transmettre votre dossier', false);

        $this->assertSame(1, substr_count($response->getContent(), 'Conditions de financement'));
    }

    public function test_google_tracking_tags_are_rendered_from_constants(): void
    {
        $response = $this->get('/fr');

        $response->assertOk()
            ->assertSee(GOOGLE_TAG_MANAGER_ID, false)
            ->assertSee('googletagmanager.com/gtm.js', false)
            ->assertSee('googletagmanager.com/ns.html', false)
            ->assertDontSee('gtag/js', false)
            ->assertDontSee('AW-17651418820', false)
            ->assertDontSee('AW-17045015802', false);
    }

    public function test_financing_conditions_translations_exist_in_language_files(): void
    {
        foreach (glob(resource_path('lang/*.json')) as $languageFile) {
            $translations = json_decode(file_get_contents($languageFile), true);

            $this->assertIsArray($translations, basename($languageFile) . ' must be valid JSON.');

            foreach (range(591, 600) as $translationKey) {
                $this->assertArrayHasKey('TRAD_' . $translationKey, $translations, basename($languageFile));
            }
        }
    }

    public function test_german_translations_cover_french_keys(): void
    {
        $french = json_decode(file_get_contents(resource_path('lang/fr.json')), true);
        $german = json_decode(file_get_contents(resource_path('lang/de.json')), true);

        $this->assertSame([], array_values(array_diff(array_keys($french), array_keys($german))));
    }

    public function test_german_pages_do_not_show_translation_keys(): void
    {
        $this->get('/de')
            ->assertOk()
            ->assertDontSee('TRAD_', false);

        $this->get('/de/obtain-financing')
            ->assertOk()
            ->assertDontSee('TRAD_', false);

        $this->get('/de/merci')
            ->assertOk()
            ->assertDontSee('TRAD_', false);
    }

    public function test_brand_name_is_resolved_in_approved_email_and_contract(): void
    {
        app()->setLocale('el');

        $financing = [
            'reference' => 'JEM-TEST',
            'prenom' => 'Nikos',
            'nom' => 'Papadopoulos',
            'adresse_complete' => 'Athens 1',
            'adresse_pays' => 'Greece',
            'email' => 'nikos@example.com',
            'telephone' => '+30 123456789',
            'montant_du_pret' => '10000',
            'duree_totale_du_pret' => 48,
            'taux_TEAG' => TEAG,
            'mensualite_estimee' => '224.00 €',
            'montant_total_a_rembourser' => '10752.00 €',
            'frais_traitement' => loan_processing_fee_for_locale('el'),
        ];

        $emailHtml = (new LoanApproved([
            'name' => 'Nikos Papadopoulos',
            'request_id' => 'JEM-TEST',
            'financing' => $financing,
            'approved_at' => '2026-05-01 14:00:00',
        ]))->render();

        $contractHtml = view('contracts.loan-contract', [
            'financing' => $financing,
        ])->render();

        $this->assertStringContainsString(SITE_NAME, $emailHtml);
        $this->assertStringContainsString(SITE_NAME, $contractHtml);
        $legacyBrand = 'Opti' . 'vest';

        $this->assertStringNotContainsString($legacyBrand, $emailHtml);
        $this->assertStringNotContainsString($legacyBrand, $contractHtml);
        $this->assertStringNotContainsString('(WEBSITE_NAME)', $emailHtml);
        $this->assertStringNotContainsString('(WEBSITE_NAME)', $contractHtml);
    }

    public function test_language_files_do_not_contain_old_brand_name(): void
    {
        $legacyBrand = 'opti' . 'vest';
        $legacyDomain = 'opti' . 'vest' . 'group.com';

        foreach (glob(resource_path('lang/*.json')) as $languageFile) {
            $content = mb_strtolower(file_get_contents($languageFile));

            $this->assertStringNotContainsString($legacyBrand, $content, basename($languageFile));
            $this->assertStringNotContainsString($legacyDomain, $content, basename($languageFile));
        }
    }

    public function test_preaccepted_email_does_not_include_complete_dossier_link(): void
    {
        app()->setLocale('pl');

        $html = (new FinancingPreAccepted([
            'name' => 'Anna Kowalska',
            'request_id' => 'JEM-TEST',
            'complete_financing_url' => 'https://example.test/pl/moj-wniosek?reference=JEM-TEST',
            'financing' => [
                'montant_du_pret' => '5000',
                'duree_totale_du_pret' => 24,
            ],
        ]))->render();

        $this->assertStringNotContainsString('https://example.test/pl/moj-wniosek', $html);
    }

    public function test_processing_fee_comes_from_constant(): void
    {
        app()->setLocale('fr');

        $this->assertStringContainsString(LOAN_PROCESSING_FEE, translate(475));
        $this->assertStringNotContainsString('(LOAN_PROCESSING_FEE)', translate(475));
        $this->assertSame('150 €', loan_processing_fee_for_locale('fr'));
        $this->assertSame('90 €', loan_processing_fee_for_locale('es'));
        $this->assertSame('250 €', loan_processing_fee_for_locale('el'));
        $this->assertSame('200 €', loan_processing_fee_for_locale('pl'));
        $this->assertSame(90.0, loan_processing_fee_amount_for_locale('es'));

        $html = view('contracts.loan-contract', [
            'financing' => [
                'reference' => 'JEM-TEST',
                'prenom' => 'Anna',
                'nom' => 'Kowalska',
                'adresse_complete' => 'Marszalkowska 1',
                'adresse_pays' => 'Poland',
                'email' => 'anna@example.com',
                'telephone' => '+48 123456789',
                'montant_du_pret' => '5000',
                'duree_totale_du_pret' => 24,
                'taux_TEAG' => TEAG,
                'mensualite_estimee' => '216.00 €',
                'montant_total_a_rembourser' => '5184.00 €',
                'frais_traitement' => loan_processing_fee_for_locale('fr'),
            ],
        ])->render();

        $this->assertStringContainsString('Frais de traitement', $html);
        $this->assertStringContainsString('150 €', $html);
    }

    public function test_locale_specific_processing_fee_is_saved_with_loan_request(): void
    {
        Mail::fake();
        Storage::fake('local');

        $this->post('/es/obtain-financing', [
            'financing' => [
                'montant_du_pret' => '10000',
                'devise_du_pret' => 'EUR',
                'duree_totale_du_pret' => 48,
                'nom' => 'Dubois',
                'prenom' => 'Claire',
                'adresse_complete' => 'Rue du Lac 1',
                'adresse_pays' => 'Spain',
                'email' => 'claire@example.com',
                'telephone' => '+34 123456789',
                'sexe' => 'Mujer',
            ],
        ])->assertRedirect('/es/merci');

        $files = Storage::disk('local')->files('loan_requests');
        $this->assertCount(1, $files);

        $payload = json_decode(Storage::disk('local')->get($files[0]), true);

        $this->assertSame('90 €', $payload['financing']['frais_traitement']);
        $this->assertEquals(90.0, $payload['financing']['frais_traitement_montant']);
    }

    public function test_legal_notice_shows_legal_information_from_constants(): void
    {
        $response = $this->get('/fr/legal/legal-notice');

        $response->assertOk()
            ->assertSee('Informations légales', false)
            ->assertSee('Nom complet', false)
            ->assertSee(LEGAL_FULL_NAME, false);

        if (trim(LEGAL_REGISTRATION_OR_VAT_NUMBER) !== '') {
            $response->assertSee("Numéro d'enregistrement / TVA")
                ->assertSee(LEGAL_REGISTRATION_OR_VAT_NUMBER, false);
        }

        $this->get('/en/legal/legal-notice')
            ->assertOk()
            ->assertSee('Legal information', false)
            ->assertSee('Full name', false)
            ->assertSee('Registration / VAT number', false)
            ->assertDontSee('Informations légales', false);
    }

    public function test_polish_loan_submission_redirects_to_localized_thank_you(): void
    {
        Mail::fake();
        Storage::fake('local');

        $this->post('/pl/obtain-financing', [
            'financing' => [
                'montant_du_pret' => '5000',
                'devise_du_pret' => 'EUR',
                'duree_totale_du_pret' => 24,
                'nom' => 'Kowalska',
                'prenom' => 'Anna',
                'adresse_complete' => 'Marszalkowska 1',
                'adresse_pays' => 'Poland',
                'email' => 'anna@example.com',
                'telephone' => '+48123456789',
                'sexe' => 'Kobieta',
            ],
        ])->assertRedirect('/pl/merci');
    }
}
