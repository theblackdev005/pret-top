<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('loan_approved_title') }}</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f7fb;
            font-family: Arial, sans-serif;
            color: #334155;
        }

        .email-container {
            max-width: 680px;
            margin: 24px auto;
            background: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
        }

        .header {
            background: linear-gradient(135deg, #16a34a 0%, #15803d 100%);
            color: #ffffff;
            text-align: center;
            padding: 20px 24px;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            line-height: 1.2;
            font-weight: 800;
            letter-spacing: -0.4px;
        }

        .content {
            padding: 32px 34px 28px;
            font-size: 17px;
            line-height: 1.85;
            color: #334155;
        }

        .content p {
            margin: 0 0 20px;
        }

        .content strong {
            color: #0f172a;
        }

        .highlight {
            color: #15803d;
            font-weight: 800;
        }

        .summary-box {
            margin: 26px 0;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 24px 22px;
            box-shadow: 0 6px 18px rgba(15, 23, 42, 0.04);
        }

        .summary-title {
            margin: 0 0 18px;
            font-size: 24px;
            line-height: 1.3;
            font-weight: 800;
            color: #0f172a;
        }

        .summary-ref {
            margin-bottom: 20px;
        }

        .label {
            display: block;
            font-size: 13px;
            color: #64748b;
            margin-bottom: 6px;
        }

        .value-ref {
            font-size: 24px;
            line-height: 1.3;
            font-weight: 800;
            color: #0f172a;
            word-break: break-word;
        }

        .grid {
            width: 100%;
            border-collapse: collapse;
        }

        .grid td {
            width: 50%;
            vertical-align: top;
            padding: 0 12px 18px 0;
        }

        .grid td:last-child {
            padding-right: 0;
            padding-left: 12px;
        }

        .value {
            font-size: 22px;
            line-height: 1.25;
            font-weight: 800;
            color: #0f172a;
        }

        .subvalue {
            margin-top: 6px;
            font-size: 13px;
            color: #64748b;
            line-height: 1.5;
        }

        .total-box {
            margin-top: 4px;
            padding-top: 16px;
            border-top: 1px solid #e5e7eb;
        }

        .notice-box {
            margin: 26px 0 22px;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 14px;
            padding: 18px 20px;
            color: #166534;
        }

        .notice-box p {
            margin: 0;
            font-size: 15px;
            line-height: 1.8;
        }

        .contact-box {
            margin-top: 26px;
            padding-top: 22px;
            border-top: 1px solid #e5e7eb;
            font-size: 16px;
            line-height: 1.9;
        }

        .contact-box a {
            color: #16a34a;
            text-decoration: none;
            font-weight: 800;
        }

        .footer {
            background: #f8fafc;
            text-align: center;
            padding: 20px 18px;
            font-size: 14px;
            line-height: 1.6;
            color: #94a3b8;
            border-top: 1px solid #e5e7eb;
        }

        @media only screen and (max-width: 640px) {
            .content {
                padding: 26px 22px 22px;
                font-size: 16px;
            }

            .header h1 {
                font-size: 25px;
            }

            .summary-title {
                font-size: 22px;
            }

            .grid,
            .grid tbody,
            .grid tr,
            .grid td {
                display: block;
                width: 100%;
            }

            .grid td,
            .grid td:last-child {
                padding: 0 0 18px 0;
            }
        }
    </style>
</head>
<body>
@php
    $nom = $financing['nom'] ?? '';
    $prenom = $financing['prenom'] ?? '';
    $nomComplet = trim($prenom . ' ' . $nom);

    $montant = $financing['montant_du_pret'] ?? '-';
    $duree = $financing['duree_totale_du_pret'] ?? '-';
    $mensualite = $financing['mensualite_estimee'] ?? '-';
    $total = $financing['montant_total_a_rembourser'] ?? '-';
    $reference = $request_id ?? '-';

    $approvedAt = $approved_at ?? now()->format('Y-m-d H:i:s');
    $hour = (int) date('H', strtotime($approvedAt));
    $salutation = $hour >= 18 ? __('greeting_evening') : __('greeting_morning');

    $dateDebut = date('d/m/Y', strtotime('+2 months', strtotime($approvedAt)));
@endphp

<div class="email-container">

    <div class="header">
        <h1>{{ __('loan_approved_title') }}</h1>
    </div>

    <div class="content">
        <p>{{ $salutation }} <strong>{{ $nomComplet }}</strong>,</p>

        <p>
            {{ __('loan_approved_subtitle') }}
        </p>

        <p>
            {{ __('loan_approved_intro_before') }}
            <span class="highlight">{{ __('loan_approved_intro_highlight') }}</span>.
        </p>

        <p>
            {{ __('loan_approved_contract_text') }}
        </p>

        <div class="summary-box">
            <p class="summary-title">{{ __('loan_summary_title') }}</p>

            <div class="summary-ref">
                <span class="label">{{ __('loan_reference') }}</span>
                <div class="value-ref">#{{ $reference }}</div>
            </div>

            <table class="grid" role="presentation" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td>
                        <span class="label">{{ __('loan_amount') }}</span>
                        <div class="value">{{ $montant }}</div>
                    </td>
                    <td>
                        <span class="label">{{ __('loan_duration') }}</span>
                        <div class="value">{{ $duree }} {{ __('loan_duration_unit') }}</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="label">{{ __('loan_monthly') }}</span>
                        <div class="value">{{ $mensualite }}</div>
                        <div class="subvalue">{{ __('loan_monthly_note') }}</div>
                    </td>
                    <td>
                        <span class="label">{{ __('loan_start_date') }}</span>
                        <div class="value">{{ $dateDebut }}</div>
                    </td>
                </tr>
            </table>

            <div class="total-box">
                <span class="label">{{ __('loan_total') }}</span>
                <div class="value">{{ $total }}</div>
            </div>
        </div>

        <div class="notice-box">
            <p>
                {{ __('loan_notice') }}
            </p>
        </div>

        <p>
            {{ __('loan_manager_notice') }}
        </p>

        <p>{{ __('loan_thanks') }}</p>

        <p>
            {{ __('loan_closing') }},<br>
            <strong>{{ __('loan_signature') }}</strong>
        </p>

        <div class="contact-box">
            {{ __('loan_contact') }}
            <a href="mailto:{{ SITE_EMAIL }}">{{ SITE_EMAIL }}</a>
            {{ __('loan_or_contact') }}
            <a href="https://wa.me/{{ SITE_PHONE }}" target="_blank">{{ SITE_PHONE }}</a>.
        </div>
    </div>

    <div class="footer">
        &copy; {{ date('Y') }} <strong>{{ SITE_NAME }}</strong>. {{ __('loan_footer_rights') }}
    </div>
</div>

</body>
</html>