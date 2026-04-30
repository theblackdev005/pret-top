@extends('emails.layout')

@section('content')

@php
    $nom = $financing['nom'] ?? '';
    $prenom = $financing['prenom'] ?? '';
    $nomComplet = trim($nom . ' ' . $prenom);

    $montantRaw = $financing['montant_du_pret'] ?? 0;
    $montantNumerique = (float) preg_replace('/[^0-9.,]/', '', str_replace(',', '.', (string) $montantRaw));

    $duree = $financing['duree_totale_du_pret'] ?? '-';
    $telephone = $financing['telephone'] ?? null;
    $email = $financing['email'] ?? null;

    $montantTotal = $financing['montant_total_a_rembourser'] ?? '-';
    $mensualite = $financing['mensualite_estimee'] ?? '-';

    $ville = $financing['geo_city'] ?? ($financing['ville'] ?? null);
    $pays = $financing['geo_country'] ?? ($financing['adresse_pays'] ?? null);

    $phone = $telephone ? preg_replace('/[^0-9]/', '', $telephone) : null;

    if ($phone && substr($phone, 0, 1) === '0') {
        $phone = '34' . substr($phone, 1);
    }

    $whatsMessage = urlencode(
    str_replace(
        [':nom', ':montant', ':duree', ':agent', ':site'],
        [$nomComplet, $montantRaw, $duree, 'Mike Lang', config('app.name')],
        translate(584)
    )
);

    $score = 0;

    if ($montantNumerique >= 3000) $score += 2;
    if ($montantNumerique >= 5000) $score += 2;
    if ($montantNumerique >= 10000) $score += 2;
    if (!empty($telephone)) $score += 2;
    if (!empty($email)) $score += 1;
    if (!empty($duree) && $duree !== '-') $score += 1;

    if ($score >= 8) {
        $priorite = '🔥 Priorité haute';
    } elseif ($score >= 5) {
        $priorite = '✅ Priorité normale';
    } else {
        $priorite = '🟡 À vérifier';
    }
@endphp

<p style="margin:0 0 16px 0;font-size:20px;line-height:1.4;font-weight:700;color:#111111;">
    🚀 Nouvelle demande de financement
</p>

<div style="margin:0 0 18px 0;">
    <span style="display:inline-block;background:#111827;color:#ffffff;font-size:13px;font-weight:700;padding:8px 12px;margin:0 8px 8px 0;">
        {{ $priorite }}
    </span>

    <span style="display:inline-block;background:#f3f4f6;color:#111111;font-size:13px;font-weight:700;padding:8px 12px;margin:0 8px 8px 0;">
        🧠 Score : {{ $score }}/10
    </span>

    @if($ville || $pays)
        <span style="display:inline-block;background:#f3f4f6;color:#111111;font-size:13px;font-weight:700;padding:8px 12px;margin:0 8px 8px 0;">
            📍 {{ trim(($ville ? $ville : '') . ($ville && $pays ? ', ' : '') . ($pays ? $pays : '')) }}
        </span>
    @endif
</div>

<div style="margin:0 0 22px 0;padding:18px;background-color:#f9fafb;border:1px solid #e5e7eb;">
    <div style="font-size:13px;color:#6b7280;margin-bottom:6px;">Client</div>
    <div style="font-size:24px;line-height:1.3;font-weight:700;color:#111111;margin-bottom:16px;">
        {{ $nomComplet ?: '-' }}
    </div>

    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="width:100%;border-collapse:collapse;">
        <tr>
            <td style="padding:0 12px 14px 0;vertical-align:top;width:50%;">
                <div style="font-size:13px;color:#6b7280;">Montant demandé</div>
                <div style="font-size:20px;font-weight:700;color:#111111;">{{ $montantRaw ?: '-' }}</div>
            </td>
            <td style="padding:0 0 14px 12px;vertical-align:top;width:50%;">
                <div style="font-size:13px;color:#6b7280;">Durée</div>
                <div style="font-size:20px;font-weight:700;color:#111111;">{{ $duree }}</div>
            </td>
        </tr>
        <tr>
            <td style="padding:0 12px 14px 0;vertical-align:top;width:50%;">
                <div style="font-size:13px;color:#6b7280;">Montant total à rembourser</div>
                <div style="font-size:20px;font-weight:700;color:#111111;">{{ $montantTotal }}</div>
            </td>
            <td style="padding:0 0 14px 12px;vertical-align:top;width:50%;">
                <div style="font-size:13px;color:#6b7280;">Mensualité estimée</div>
                <div style="font-size:20px;font-weight:700;color:#111111;">{{ $mensualite }}</div>
            </td>
        </tr>
    </table>

    @if($telephone)
        <div style="margin-top:14px;padding-top:14px;border-top:1px solid #e5e7eb;">
            <div style="font-size:13px;color:#6b7280;">Téléphone</div>
            <div style="font-size:20px;font-weight:700;color:#111111;word-break:break-word;">
                <a href="https://wa.me/{{ $phone }}?text={{ $whatsMessage }}" style="color:#25D366;text-decoration:none;word-break:break-all;">
                    {{ $telephone }}
                </a>
            </div>
        </div>
    @endif

    @if($email)
        <div style="margin-top:14px;padding-top:14px;border-top:1px solid #e5e7eb;">
            <div style="font-size:13px;color:#6b7280;">Email</div>
            <div style="font-size:20px;font-weight:700;color:#111111;word-break:break-word;">
                <a href="mailto:{{ $email }}" style="color:#2563eb;text-decoration:none;word-break:break-all;">
                    {{ $email }}
                </a>
            </div>
        </div>
    @endif
</div>

<div style="margin:0 0 24px 0;">
    @if($telephone)
        <a href="https://wa.me/{{ $phone }}?text={{ $whatsMessage }}"
           style="display:inline-block;background:#25D366;color:#ffffff;padding:11px 14px;text-decoration:none;font-weight:700;margin:0 8px 8px 0;">
            💬 Ouvrir WhatsApp
        </a>
    @endif

    @if($email)
        <a href="mailto:{{ $email }}"
           style="display:inline-block;background:#2563eb;color:#ffffff;padding:11px 14px;text-decoration:none;font-weight:700;margin:0 8px 8px 0;">
            📧 Envoyer un email
        </a>
    @endif
</div>

@if(!empty($complete_financing_url))
    <div style="margin:0 0 24px 0;padding:16px;background:#eff6ff;border:1px solid #bfdbfe;">
        <div style="font-size:13px;color:#1d4ed8;font-weight:700;margin-bottom:8px;">
            Lien de complétion du dossier
        </div>
        <a href="{{ $complete_financing_url }}"
           style="color:#2563eb;font-weight:700;text-decoration:none;word-break:break-all;">
            {{ $complete_financing_url }}
        </a>
    </div>
@endif

<p style="margin:0 0 12px 0;font-size:16px;line-height:1.5;font-weight:700;color:#111111;">
    📋 Détails complets
</p>

@foreach ($financing as $key => $value)
    <div style="padding:0 0 14px 0;margin:0 0 14px 0;border-bottom:1px solid #e5e7eb;">
        <div style="font-size:14px;line-height:1.5;color:#6b7280;margin:0 0 6px 0;">
            {{ ucfirst(str_replace('_', ' ', $key)) }}
        </div>

        <div style="font-size:16px;line-height:1.6;color:#111111;font-weight:700;word-break:break-word;">
            @if($key === 'email')
                <a href="mailto:{{ $value }}" style="color:#2563eb;text-decoration:none;">
                    {{ $value }}
                </a>
            @elseif(in_array($key, ['telephone', 'phone', 'tel', 'mobile', 'portable']))
                @php
                    $detailPhone = preg_replace('/[^0-9]/', '', $value);
                    if ($detailPhone && substr($detailPhone, 0, 1) === '0') {
                        $detailPhone = '34' . substr($detailPhone, 1);
                    }
                @endphp
                <a href="https://wa.me/{{ $detailPhone }}?text={{ $whatsMessage }}" style="color:#25D366;text-decoration:none;">
                    {{ $value }}
                </a>
            @elseif(in_array($key, ['taux_taeg', 'taux_teag']))
            @else
                {{ is_array($value) ? json_encode($value) : $value }}
            @endif
        </div>
    </div>
@endforeach

{{-- 🔥 BOUTON ADMIN --}}
@if(!empty($request_id))
    <div style="margin-top:25px;">
        <a href="{{ url('/admin/loan-requests/approve/' . $request_id) }}"
           style="display:inline-block;background:#16a34a;color:#fff;padding:14px 18px;font-weight:700;text-decoration:none;border-radius:6px;">
            ✅ Valider et envoyer le contrat
        </a>
    </div>
@endif

@if (isset($location_match) && !$location_match)
    <div style="margin-top:24px;padding:16px;background-color:#fff5f5;border-left:4px solid #dc2626;font-size:14px;line-height:1.7;color:#111111;">
        <strong style="color:#b91c1c;">⚠ Alerte de vérification</strong><br><br>

        L’adresse saisie par l’utilisateur semble ne pas correspondre à sa localisation géographique détectée automatiquement.<br><br>

        <strong>Adresse saisie :</strong><br>
        {{ $adresse_declaree ?? 'Non renseignée' }}<br><br>

        <strong>Localisation détectée (IP) :</strong><br>
        {{ $geo_detectee ?? 'Non détectée' }}
    </div>
@endif

@endsection
