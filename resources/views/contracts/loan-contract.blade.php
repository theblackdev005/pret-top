<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="UTF-8">
<title>{{ __('TRAD_412') }}</title>

<style>
    @page {
        margin: 20px 22px;
    }

    body {
        font-family: DejaVu Sans, Arial, sans-serif;
        font-size: 11.5px;
        color: #111827;
        line-height: 1.5;
    }

    .header {
        border-bottom: 2px solid #16a34a;
        padding-bottom: 8px;
        margin-bottom: 12px;
    }

    .header-table {
        width: 100%;
        border-collapse: collapse;
    }

    .header-table td {
        vertical-align: middle;
    }

    .logo {
        width: 95px;
    }

    .title-wrap {
        text-align: right;
    }

    .title {
        font-size: 19px;
        font-weight: bold;
        letter-spacing: 0.4px;
        color: #0f172a;
    }

    .contract-no {
        font-size: 10.5px;
        color: #6b7280;
        margin-top: 2px;
    }

    .summary {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 10px;
    }

    .summary td {
        width: 50%;
        vertical-align: top;
        padding: 0 0 0 8px;
    }

    .summary td:first-child {
        padding-left: 0;
        padding-right: 8px;
    }

    .panel {
        border: 1px solid #dbe3ea;
        background: #ffffff;
        padding: 9px 10px;
    }

    .panel-green {
        border-left: 4px solid #16a34a;
        background: #f6fef8;
    }

    .panel-title {
        font-size: 11.5px;
        font-weight: bold;
        color: #0f172a;
        margin-bottom: 4px;
    }

    .section {
        margin-bottom: 8px;
    }

    .section-title {
        font-size: 12px;
        font-weight: bold;
        color: #0f172a;
        background: #f3f4f6;
        border-left: 3px solid #16a34a;
        padding: 6px 8px;
        margin-bottom: 4px;
    }

    .box {
        border: 1px solid #e5e7eb;
        background: #ffffff;
        padding: 8px 9px;
    }

    .financial {
        width: 100%;
        border-collapse: collapse;
    }

    .financial td {
        border: 1px solid #e5e7eb;
        padding: 6px 7px;
        vertical-align: top;
    }

    .financial .label {
        width: 34%;
        background: #f8fafc;
        font-weight: bold;
        color: #111827;
    }

    .signature {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .signature td {
        width: 50%;
        text-align: center;
        vertical-align: top;
        padding-top: 20px;
    }

    .sign-line {
        margin: 0 auto 6px auto;
        width: 80%;
        border-top: 1px solid #111827;
        height: 1px;
    }

    .footer {
        margin-top: 12px;
        text-align: center;
        font-size: 9.5px;
        color: #6b7280;
    }
</style>
</head>

<body>

@php
    $numeroContrat = $financing['reference'] ?? '';
    $nomComplet = trim(($financing['prenom'] ?? '') . ' ' . ($financing['nom'] ?? ''));
    $dateContrat = date('d/m/Y');
    $frais = $financing['frais_traitement'] ?? LOAN_PROCESSING_FEE;
@endphp

<div class="header">
    <table class="header-table">
        <tr>
            <td>
                <img src="{{ public_path('assets/images/logo.svg') }}" alt="Logo" style="height: 60px;">
            </td>
            <td>
                <div class="title-wrap">
                    <div class="title">{{ __('TRAD_413') }}</div>
                    <div class="contract-no">N° {{ $numeroContrat }}</div>
                </div>
            </td>
        </tr>
    </table>
</div>

<table class="summary">
    <tr>
        <td>
            <div class="panel panel-green">
                <div class="panel-title">{{ __('TRAD_414') }}</div>
                {!! nl2br(e(__('TRAD_415', ['name' => $nomComplet]))) !!}
            </div>
        </td>
        <td>
            <div class="panel">
                <div class="panel-title">{{ __('TRAD_416') }}</div>
                <strong>{{ __('TRAD_417') }}</strong> {{ $dateContrat }}<br>
                <strong>{{ __('TRAD_418') }}</strong> {{ $numeroContrat }}<br>
                <strong>{{ __('TRAD_419') }}</strong> {{ SITE_NAME }}
            </div>
        </td>
    </tr>
</table>

<div class="section">
    <div class="section-title">{{ __('TRAD_420') }}</div>
    <div class="box">
        <strong>{{ __('TRAD_421') }}</strong><br>
        {{ SITE_NAME }}<br>
        {{ SITE_ADDRESS }}<br>
        {{ SITE_EMAIL }}<br><br>

        <strong>{{ __('TRAD_422') }}</strong><br>
        {{ $nomComplet }}<br>
        {{ $financing['adresse_complete'] ?? '-' }}, {{ $financing['adresse_pays'] ?? '-' }}<br>
        {{ __('TRAD_423') }} {{ $financing['email'] ?? '-' }}<br>
        {{ __('TRAD_424') }} {{ $financing['telephone'] ?? '-' }}
    </div>
</div>

<div class="section">
    <div class="section-title">{{ __('TRAD_425') }}</div>
    <table class="financial">
        <tr>
            <td class="label">{{ __('TRAD_426') }}</td>
            <td>{{ $financing['montant_du_pret'] }} €</td>
            <td class="label">{{ __('TRAD_427') }}</td>
            <td>{{ $financing['duree_totale_du_pret'] }} {{ app()->getLocale() === 'es' ? 'meses' : 'mois' }}</td>
        </tr>
        <tr>
            <td class="label">{{ __('TRAD_428') }}</td>
            <td>{{ $financing['taux_TEAG'] }}</td>
            <td class="label">{{ __('TRAD_429') }}</td>
            <td>{{ $financing['mensualite_estimee'] }}</td>
        </tr>
        <tr>
            <td class="label">{{ __('TRAD_430') }}</td>
            <td colspan="3">{{ $financing['montant_total_a_rembourser'] }}</td>
        </tr>
        <tr>
            <td class="label">{{ __('TRAD_431') }}</td>
            <td colspan="3">{{ $frais }}</td>
        </tr>
    </table>
</div>

<div class="section">
    <div class="section-title">{{ __('TRAD_433') }}</div>
    <div class="box">
        {{ __('TRAD_434') }}
    </div>
</div>

<div class="section">
    <div class="section-title">{{ __('TRAD_435') }}</div>
    <div class="box">
        {{ __('TRAD_436') }}
    </div>
</div>

<div class="section">
    <div class="section-title">{{ __('TRAD_437') }}</div>
    <div class="box">
        {{ __('TRAD_438') }}
    </div>
</div>

<div class="section">
    <div class="section-title">{{ __('TRAD_439') }}</div>
    <div class="box">
        {{ __('TRAD_440') }}
    </div>
</div>

<div class="section">
    <div class="section-title">{{ __('TRAD_441') }}</div>
    <div class="box">
        {{ __('TRAD_442') }}
    </div>
</div>

<div class="section">
    <div class="section-title">{{ __('TRAD_443') }}</div>
    <div class="box">
        {{ __('TRAD_444') }}
    </div>
</div>

<div class="section">
    <div class="section-title">{{ __('TRAD_445') }}</div>
    <div class="box">
        {{ __('TRAD_446') }}
    </div>
</div>

<table class="signature">
    <tr>
        <td>
            <div class="sign-line"></div>
            <strong>{{ SITE_NAME }}</strong>
        </td>
        <td>
            <div class="sign-line"></div>
            <strong>{{ $nomComplet }}</strong>
        </td>
    </tr>
</table>

<div class="footer">
    {{ __('TRAD_447', ['date' => $dateContrat]) }}
</div>

</body>
</html>
