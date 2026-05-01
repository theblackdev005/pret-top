@extends('layouts.default')

@section('content')
    <x-breadcrumb></x-breadcrumb>

    <style>
        .loan-modern-shell {
            max-width: 1080px;
            margin: 0 auto;
        }

        .loan-hero {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            border-radius: 24px;
            padding: 34px 30px;
            color: #fff;
            margin-bottom: 28px;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.12);
        }

        .loan-hero h1 {
            font-size: 40px;
            line-height: 1.15;
            font-weight: 800;
            margin-bottom: 12px;
            color: #fff;
        }

        .loan-hero-notice {
            margin-top: 18px;
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 16px;
            padding: 16px 18px;
        }

        .loan-hero-notice-title {
            font-size: 13px;
            font-weight: 800;
            letter-spacing: .3px;
            text-transform: uppercase;
            margin-bottom: 6px;
            color: #fff;
        }

        .loan-hero-notice-text {
            margin: 0;
            font-size: 15px;
            line-height: 1.75;
            color: rgba(255,255,255,0.92);
        }

        .loan-grid {
            display: grid;
            grid-template-columns: 1.05fr 1.35fr;
            gap: 24px;
            align-items: start;
        }

        .loan-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 22px;
            padding: 28px 26px;
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.05);
        }

        .loan-card-title {
            font-size: 28px;
            line-height: 1.2;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 8px;
        }

        .loan-card-subtitle {
            font-size: 15px;
            line-height: 1.75;
            color: #6b7280;
            margin-bottom: 22px;
        }

        .loan-divider {
            height: 1px;
            background: #eef2f7;
            margin: 18px 0 22px;
        }

        .loan-live-box {
            margin-top: 18px;
            background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            padding: 18px;
        }

        .loan-live-title {
            font-size: 14px;
            font-weight: 800;
            color: #111827;
            margin-bottom: 12px;
        }

        .loan-live-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .loan-live-item {
            background: #ffffff;
            border: 1px solid #eef2f7;
            border-radius: 14px;
            padding: 14px;
        }

        .loan-live-label {
            display: block;
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 6px;
        }

        .loan-live-value {
            font-size: 22px;
            font-weight: 800;
            color: #0f172a;
            line-height: 1.2;
            transition: all 0.2s ease;
        }

        .loan-live-note {
            margin-top: 12px;
            font-size: 13px;
            color: #6b7280;
            line-height: 1.7;
        }

        .loan-submit-box {
            margin-top: 26px;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 22px;
            padding: 22px 24px;
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.04);
        }

        .loan-submit-note {
            text-align: center;
            font-size: 14px;
            color: #6b7280;
            font-weight: 600;
            margin-top: 12px;
        }

        .loan-submit-box .readon.submit {
            width: 100%;
            border-radius: 16px !important;
            font-size: 20px !important;
            padding: 18px 24px !important;
        }

        .loan-mini-tag {
            display: inline-block;
            font-size: 13px;
            color: #15803d;
            background: #ecfdf3;
            padding: 6px 12px;
            border-radius: 999px;
            font-weight: 700;
            margin-bottom: 14px;
        }

        .loan-modern-shell .form-group {
            margin-bottom: 18px;
        }

        .loan-modern-shell .input-group-text {
            min-width: 56px;
            justify-content: center;
        }

        .loan-phone-input {
            flex-wrap: nowrap;
        }

        .loan-phone-input .input-group-prepend {
            flex: 0 0 auto;
        }

        .loan-phone-code-select {
            width: 112px;
            height: 50px;
            border: 1px solid #e5e7eb;
            border-right: 0;
            border-radius: 8px 0 0 8px;
            background-color: #f8fafc;
            color: #0f172a;
            font-weight: 700;
            padding: 0 8px;
            text-align: center;
        }

        .loan-phone-input .form-control {
            min-width: 0;
        }

        .loan-field-label {
            display: block;
            font-size: 14px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 10px;
        }

        .loan-checkbox-wrap {
            background: #fff7ed;
            border: 1px solid #fed7aa;
            border-radius: 14px;
            padding: 14px 16px;
            margin-top: 16px;
        }

        .loan-checkbox-wrap label {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 14px;
            line-height: 1.75;
            color: #374151;
            margin: 0;
            cursor: pointer;
        }

        .loan-checkbox-wrap input[type="checkbox"] {
            margin-top: 4px;
        }

        .amount-grid,
        .duration-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        .amount-btn,
        .duration-btn {
            height: 56px;
            border-radius: 14px;
            border: 1px solid #e5e7eb;
            background: #ffffff;
            font-weight: 700;
            font-size: 15px;
            color: #0f172a;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .amount-btn:hover,
        .duration-btn:hover {
            border-color: #16a34a;
            background: #f0fdf4;
        }

        .amount-btn.active,
        .duration-btn.active {
            background: #16a34a;
            color: #ffffff;
            border-color: #16a34a;
            box-shadow: 0 6px 16px rgba(22,163,74,0.25);
        }

        @media (max-width: 991px) {
            .loan-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 767px) {
            .loan-hero {
                padding: 26px 18px;
                border-radius: 18px;
            }

            .loan-hero h1 {
                font-size: 31px;
            }

            .loan-card,
            .loan-submit-box {
                padding: 22px 18px;
                border-radius: 18px;
            }

            .loan-card-title {
                font-size: 24px;
            }

            .loan-live-grid {
                grid-template-columns: 1fr;
            }

            .amount-grid,
            .duration-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 10px;
            }

            .amount-btn,
            .duration-btn {
                height: 48px;
                font-size: 13px;
                border-radius: 12px;
                padding: 0 6px;
            }
        }

        @media (max-width: 380px) {
            .amount-grid,
            .duration-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .amount-btn,
            .duration-btn {
                height: 46px;
                font-size: 13px;
            }

            .loan-phone-code-select {
                width: 98px;
                font-size: 13px;
                padding: 0 4px;
            }
        }
    </style>

    <div class="rs-contact contact-style3 pt-5 md-pt-80 mb-5">
        <div class="container">
            <div class="loan-modern-shell">
                <x-alert only="success"></x-alert>
                <x-alert only="error"></x-alert>

                @php
                    $loanLocale = app()->getLocale();
                    $loanPageTexts = [
                        'financing_tag' => [
                            'de' => 'Finanzierung',
                            'el' => 'Χρηματοδότηση',
                            'en' => 'Financing',
                            'es' => 'Financiación',
                            'it' => 'Finanziamento',
                            'pl' => 'Finansowanie',
                            'pt' => 'Financiamento',
                        ],
                        'instant_calculation' => [
                            'de' => '✔ Sofortige Berechnung ohne Verpflichtung',
                            'el' => '✔ Άμεσος υπολογισμός χωρίς δέσμευση',
                            'en' => '✔ Immediate calculation with no obligation',
                            'es' => '✔ Cálculo inmediato sin compromiso',
                            'it' => '✔ Calcolo immediato senza impegno',
                            'pl' => '✔ Natychmiastowa kalkulacja bez zobowiązań',
                            'pt' => '✔ Cálculo imediato sem compromisso',
                        ],
                        'identity_tag' => [
                            'de' => 'Identität',
                            'el' => 'Ταυτότητα',
                            'en' => 'Identity',
                            'es' => 'Identidad',
                            'it' => 'Identità',
                            'pl' => 'Tożsamość',
                            'pt' => 'Identidade',
                        ],
                        'identity_subtitle' => [
                            'de' => 'Vervollständigen Sie Ihre Angaben, damit wir Ihre Akte validieren können.',
                            'el' => 'Συμπληρώστε τα στοιχεία σας ώστε να μπορέσουμε να επικυρώσουμε τον φάκελό σας.',
                            'en' => 'Complete your information so we can validate your file.',
                            'es' => 'Complete sus datos para que podamos validar su expediente.',
                            'it' => 'Completa i tuoi dati affinché possiamo convalidare la tua pratica.',
                            'pl' => 'Uzupełnij swoje dane, abyśmy mogli zweryfikować Twoją sprawę.',
                            'pt' => 'Preencha os seus dados para que possamos validar o seu processo.',
                        ],
                        'amount_error' => [
                            'de' => 'Wählen Sie einen gültigen Betrag aus.',
                            'el' => 'Επιλέξτε ένα έγκυρο ποσό.',
                            'en' => 'Select a valid amount.',
                            'es' => 'Seleccione un importe válido.',
                            'it' => 'Seleziona un importo valido.',
                            'pl' => 'Wybierz prawidłową kwotę.',
                            'pt' => 'Selecione um montante válido.',
                        ],
                        'duration_error' => [
                            'de' => 'Wählen Sie die Laufzeit Ihres Darlehens aus.',
                            'el' => 'Επιλέξτε τη διάρκεια του δανείου σας.',
                            'en' => 'Select your loan duration.',
                            'es' => 'Seleccione la duración de su préstamo.',
                            'it' => 'Seleziona la durata del tuo prestito.',
                            'pl' => 'Wybierz okres spłaty pożyczki.',
                            'pt' => 'Selecione a duração do seu empréstimo.',
                        ],
                        'country_placeholder' => [
                            'de' => 'Wählen Sie Ihr Land',
                            'el' => 'Επιλέξτε τη χώρα σας',
                            'en' => 'Choose your country',
                            'es' => 'Elija su país',
                            'it' => 'Scegli il tuo Paese',
                            'pl' => 'Wybierz swój kraj',
                            'pt' => 'Escolha o seu país',
                        ],
                        'phone_prefix_placeholder' => [
                            'de' => 'Vorwahl',
                            'el' => 'Κωδικός',
                            'en' => 'Code',
                            'es' => 'Prefijo',
                            'it' => 'Prefisso',
                            'pl' => 'Numer kier.',
                            'pt' => 'Indicativo',
                        ],
                        'phone_prefix_label' => [
                            'de' => 'Telefonvorwahl',
                            'el' => 'Τηλεφωνικός κωδικός',
                            'en' => 'Phone code',
                            'es' => 'Prefijo telefónico',
                            'it' => 'Prefisso telefonico',
                            'pl' => 'Kierunkowy',
                            'pt' => 'Indicativo telefónico',
                        ],
                    ];
                    $loanPageText = fn ($key, $fallback) => $loanPageTexts[$key][$loanLocale] ?? $fallback;
                    $loanNumberLocale = [
                        'de' => 'de-DE',
                        'el' => 'el-GR',
                        'en' => 'en-GB',
                        'es' => 'es-ES',
                        'it' => 'it-IT',
                        'pl' => 'pl-PL',
                        'pt' => 'pt-PT',
                    ][$loanLocale] ?? 'fr-FR';
                    $countryFieldValue = old('financing.adresse_pays', '');
                    $phoneDialCountries = [
                        ['iso' => 'AL', 'name' => 'Albania', 'country_value' => 'Albania', 'dial_code' => '+355', 'flag' => '🇦🇱'],
                        ['iso' => 'AD', 'name' => 'Andorra', 'country_value' => 'Andorra', 'dial_code' => '+376', 'flag' => '🇦🇩'],
                        ['iso' => 'AM', 'name' => 'Armenia', 'country_value' => 'Armenia', 'dial_code' => '+374', 'flag' => '🇦🇲'],
                        ['iso' => 'AT', 'name' => 'Austria', 'country_value' => 'Austria', 'dial_code' => '+43', 'flag' => '🇦🇹'],
                        ['iso' => 'BY', 'name' => 'Belarus', 'country_value' => 'Belarus', 'dial_code' => '+375', 'flag' => '🇧🇾'],
                        ['iso' => 'BE', 'name' => 'Belgium', 'country_value' => 'Belgium', 'dial_code' => '+32', 'flag' => '🇧🇪'],
                        ['iso' => 'BJ', 'name' => 'Benin', 'country_value' => null, 'dial_code' => '+229', 'flag' => '🇧🇯'],
                        ['iso' => 'BA', 'name' => 'Bosnia and Herzegovina', 'country_value' => 'Bosnia and Herzegovina', 'dial_code' => '+387', 'flag' => '🇧🇦'],
                        ['iso' => 'BG', 'name' => 'Bulgaria', 'country_value' => 'Bulgaria', 'dial_code' => '+359', 'flag' => '🇧🇬'],
                        ['iso' => 'CM', 'name' => 'Cameroon', 'country_value' => null, 'dial_code' => '+237', 'flag' => '🇨🇲'],
                        ['iso' => 'CA', 'name' => 'Canada', 'country_value' => null, 'dial_code' => '+1', 'flag' => '🇨🇦'],
                        ['iso' => 'HR', 'name' => 'Croatia', 'country_value' => 'Croatia (Hrvatska)', 'dial_code' => '+385', 'flag' => '🇭🇷'],
                        ['iso' => 'CY', 'name' => 'Cyprus', 'country_value' => 'Cyprus', 'dial_code' => '+357', 'flag' => '🇨🇾'],
                        ['iso' => 'CZ', 'name' => 'Czech Republic', 'country_value' => 'Czech Republic', 'dial_code' => '+420', 'flag' => '🇨🇿'],
                        ['iso' => 'DK', 'name' => 'Denmark', 'country_value' => 'Denmark', 'dial_code' => '+45', 'flag' => '🇩🇰'],
                        ['iso' => 'EE', 'name' => 'Estonia', 'country_value' => 'Estonia', 'dial_code' => '+372', 'flag' => '🇪🇪'],
                        ['iso' => 'FI', 'name' => 'Finland', 'country_value' => 'Finland', 'dial_code' => '+358', 'flag' => '🇫🇮'],
                        ['iso' => 'FR', 'name' => 'France', 'country_value' => 'France', 'dial_code' => '+33', 'flag' => '🇫🇷'],
                        ['iso' => 'GE', 'name' => 'Georgia', 'country_value' => 'Georgia', 'dial_code' => '+995', 'flag' => '🇬🇪'],
                        ['iso' => 'DE', 'name' => 'Germany', 'country_value' => 'Germany', 'dial_code' => '+49', 'flag' => '🇩🇪'],
                        ['iso' => 'GR', 'name' => 'Greece', 'country_value' => 'Greece', 'dial_code' => '+30', 'flag' => '🇬🇷'],
                        ['iso' => 'HU', 'name' => 'Hungary', 'country_value' => 'Hungary', 'dial_code' => '+36', 'flag' => '🇭🇺'],
                        ['iso' => 'IS', 'name' => 'Iceland', 'country_value' => 'Iceland', 'dial_code' => '+354', 'flag' => '🇮🇸'],
                        ['iso' => 'IE', 'name' => 'Ireland', 'country_value' => 'Ireland', 'dial_code' => '+353', 'flag' => '🇮🇪'],
                        ['iso' => 'IT', 'name' => 'Italy', 'country_value' => 'Italy', 'dial_code' => '+39', 'flag' => '🇮🇹'],
                        ['iso' => 'CI', 'name' => 'Ivory Coast', 'country_value' => null, 'dial_code' => '+225', 'flag' => '🇨🇮'],
                        ['iso' => 'JE', 'name' => 'Jersey', 'country_value' => 'Jersey', 'dial_code' => '+44', 'flag' => '🇯🇪'],
                        ['iso' => 'LV', 'name' => 'Latvia', 'country_value' => 'Latvia', 'dial_code' => '+371', 'flag' => '🇱🇻'],
                        ['iso' => 'LI', 'name' => 'Liechtenstein', 'country_value' => 'Liechtenstein', 'dial_code' => '+423', 'flag' => '🇱🇮'],
                        ['iso' => 'LT', 'name' => 'Lithuania', 'country_value' => 'Lithuania', 'dial_code' => '+370', 'flag' => '🇱🇹'],
                        ['iso' => 'LU', 'name' => 'Luxembourg', 'country_value' => 'Luxembourg', 'dial_code' => '+352', 'flag' => '🇱🇺'],
                        ['iso' => 'MK', 'name' => 'Macedonia', 'country_value' => 'Macedonia', 'dial_code' => '+389', 'flag' => '🇲🇰'],
                        ['iso' => 'MT', 'name' => 'Malta', 'country_value' => 'Malta', 'dial_code' => '+356', 'flag' => '🇲🇹'],
                        ['iso' => 'MD', 'name' => 'Moldova', 'country_value' => 'Moldova, Republic of', 'dial_code' => '+373', 'flag' => '🇲🇩'],
                        ['iso' => 'MC', 'name' => 'Monaco', 'country_value' => 'Monaco', 'dial_code' => '+377', 'flag' => '🇲🇨'],
                        ['iso' => 'ME', 'name' => 'Montenegro', 'country_value' => 'Montenegro', 'dial_code' => '+382', 'flag' => '🇲🇪'],
                        ['iso' => 'MA', 'name' => 'Morocco', 'country_value' => null, 'dial_code' => '+212', 'flag' => '🇲🇦'],
                        ['iso' => 'NL', 'name' => 'Netherlands', 'country_value' => 'Netherlands', 'dial_code' => '+31', 'flag' => '🇳🇱'],
                        ['iso' => 'NG', 'name' => 'Nigeria', 'country_value' => null, 'dial_code' => '+234', 'flag' => '🇳🇬'],
                        ['iso' => 'NO', 'name' => 'Norway', 'country_value' => 'Norway', 'dial_code' => '+47', 'flag' => '🇳🇴'],
                        ['iso' => 'PL', 'name' => 'Poland', 'country_value' => 'Poland', 'dial_code' => '+48', 'flag' => '🇵🇱'],
                        ['iso' => 'PT', 'name' => 'Portugal', 'country_value' => 'Portugal', 'dial_code' => '+351', 'flag' => '🇵🇹'],
                        ['iso' => 'RO', 'name' => 'Romania', 'country_value' => 'Romania', 'dial_code' => '+40', 'flag' => '🇷🇴'],
                        ['iso' => 'RU', 'name' => 'Russian Federation', 'country_value' => 'Russian Federation', 'dial_code' => '+7', 'flag' => '🇷🇺'],
                        ['iso' => 'SM', 'name' => 'San Marino', 'country_value' => 'San Marino', 'dial_code' => '+378', 'flag' => '🇸🇲'],
                        ['iso' => 'SN', 'name' => 'Senegal', 'country_value' => null, 'dial_code' => '+221', 'flag' => '🇸🇳'],
                        ['iso' => 'RS', 'name' => 'Serbia', 'country_value' => 'Serbia', 'dial_code' => '+381', 'flag' => '🇷🇸'],
                        ['iso' => 'SK', 'name' => 'Slovakia', 'country_value' => 'Slovakia', 'dial_code' => '+421', 'flag' => '🇸🇰'],
                        ['iso' => 'SI', 'name' => 'Slovenia', 'country_value' => 'Slovenia', 'dial_code' => '+386', 'flag' => '🇸🇮'],
                        ['iso' => 'ES', 'name' => 'Spain', 'country_value' => 'Spain', 'dial_code' => '+34', 'flag' => '🇪🇸'],
                        ['iso' => 'SE', 'name' => 'Sweden', 'country_value' => 'Sweden', 'dial_code' => '+46', 'flag' => '🇸🇪'],
                        ['iso' => 'CH', 'name' => 'Switzerland', 'country_value' => 'Switzerland', 'dial_code' => '+41', 'flag' => '🇨🇭'],
                        ['iso' => 'TG', 'name' => 'Togo', 'country_value' => null, 'dial_code' => '+228', 'flag' => '🇹🇬'],
                        ['iso' => 'TN', 'name' => 'Tunisia', 'country_value' => null, 'dial_code' => '+216', 'flag' => '🇹🇳'],
                        ['iso' => 'TR', 'name' => 'Turkey', 'country_value' => 'Turkey', 'dial_code' => '+90', 'flag' => '🇹🇷'],
                        ['iso' => 'UA', 'name' => 'Ukraine', 'country_value' => 'Ukraine', 'dial_code' => '+380', 'flag' => '🇺🇦'],
                        ['iso' => 'AE', 'name' => 'United Arab Emirates', 'country_value' => null, 'dial_code' => '+971', 'flag' => '🇦🇪'],
                        ['iso' => 'GB', 'name' => 'United Kingdom', 'country_value' => 'United Kingdom', 'dial_code' => '+44', 'flag' => '🇬🇧'],
                        ['iso' => 'US', 'name' => 'United States', 'country_value' => null, 'dial_code' => '+1', 'flag' => '🇺🇸'],
                        ['iso' => 'VA', 'name' => 'Vatican City State', 'country_value' => 'Vatican City State', 'dial_code' => '+39', 'flag' => '🇻🇦'],
                    ];
                @endphp

                <div class="loan-hero">
                    <h1>{{ translate(473) }}</h1>

                    <div class="loan-hero-notice">
                        <div class="loan-hero-notice-title">{{ translate(375) }}</div>
                        <p class="loan-hero-notice-text">{!! translate_with_loan_processing_fee(475) !!}</p>
                    </div>
                </div>

                <form action="{{ routeWithLocale('site.obtain_financing') }}" method="post" id="loanForm">
                    @csrf

                    <input type="hidden" name="financing[devise_du_pret]" value="EUR">

                    <div class="loan-grid">
                        <section class="loan-card">
                            <span class="loan-mini-tag">
                                {{ $loanPageText('financing_tag', 'Financement') }}
                            </span>

                            <h3 class="loan-card-title">{{ translate(450) }}</h3>

                            <div class="form-group">
                                <label class="loan-field-label">{{ translate(484) }}</label>

                                <div class="amount-grid" id="amountGrid">
                                    @foreach([3000,5000,7000,10000,15000,20000,25000,30000,40000,50000,60000,75000,100000,125000,150000] as $amount)
                                        <button
                                            type="button"
                                            class="amount-btn {{ old('financing.montant_du_pret') == $amount ? 'active' : '' }}"
                                            data-value="{{ $amount }}">
                                            {{ number_format($amount, 0, ',', ' ') }} €
                                        </button>
                                    @endforeach
                                </div>

                                <input
                                    type="hidden"
                                    id="amountHidden"
                                    name="financing[montant_du_pret]"
                                    value="{{ old('financing.montant_du_pret', '') }}">
                            </div>

                            <div class="form-group">
                                <label class="loan-field-label">{{ translate(485) }}</label>

                                <div class="duration-grid" id="durationGrid">
                                    @foreach([12,24,36,48,60,84,120] as $duree)
                                        <button
                                            type="button"
                                            class="duration-btn {{ old('financing.duree_totale_du_pret') == $duree ? 'active' : '' }}"
                                            data-value="{{ $duree }}">
                                            {{ $duree }} {{ translate(471) }}
                                        </button>
                                    @endforeach
                                </div>

                                <input
                                    type="hidden"
                                    id="dureeHidden"
                                    name="financing[duree_totale_du_pret]"
                                    value="{{ old('financing.duree_totale_du_pret', '') }}">
                            </div>

                            <div class="loan-live-box">
                                <div class="loan-live-title">{{ translate(477) }}</div>

                                <div class="loan-live-grid">
                                    <div class="loan-live-item">
                                        <span class="loan-live-label">{{ translate(478) }}</span>
                                        <div class="loan-live-value" id="liveMensualite">—</div>
                                        <p style="font-size:13px;color:#16a34a;font-weight:600;margin-top:6px;margin-bottom:0;">
                                            {{ $loanPageText('instant_calculation', '✔ Calcul immédiat sans engagement') }}
                                        </p>
                                    </div>

                                    <div class="loan-live-item">
                                        <span class="loan-live-label">{{ translate(479) }}</span>
                                        <div class="loan-live-value" id="liveTotal">—</div>
                                    </div>
                                </div>

                                <p class="loan-live-note">{{ translate(480) }}</p>

<p style="margin-top:10px;font-size:14px;font-weight:700;color:#16a34a;">
    🔥 {{ translate(487) }}
</p>
                            </div>
                        </section>

                        <section class="loan-card">
                            <span class="loan-mini-tag">
                                {{ $loanPageText('identity_tag', 'Identité') }}
                            </span>

                            <h3 class="loan-card-title">{{ translate(455) }}</h3>

                            <p class="loan-card-subtitle">
                                {{ $loanPageText('identity_subtitle', 'Complétez vos informations afin que nous puissions valider votre dossier.') }}
                            </p>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <x-form-input
                                            label="{{ translate(456) }}"
                                            name="financing.nom"
                                            value="{{ old('financing.nom', '') }}"
                                        />
                                    </div>
                                    <div class="col-md-6">
                                        <x-form-input
                                            label="{{ translate(457) }}"
                                            name="financing.prenom"
                                            value="{{ old('financing.prenom', '') }}"
                                        />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <x-form-input
                                    label="{{ translate(458) }}"
                                    name="financing.adresse_complete"
                                    value="{{ old('financing.adresse_complete', '') }}"
                                >
                                    <p class="form-comment m-0">
                                        <i class="fa text-theme fa-info-circle"></i>
                                        {{ translate(459) }}
                                    </p>
                                </x-form-input>
                            </div>

                            <div class="form-group">
                                <label for="address-country" class="form-label">{{ translate(460) }}</label>

                                <select
                                    class="form-control @error('financing.adresse_pays') is-invalid @enderror"
                                    name="financing[adresse_pays]"
                                    id="address-country"
                                    required
                                >
                                    <option value="" disabled {{ $countryFieldValue === '' ? 'selected' : '' }}>
                                        {{ $loanPageText('country_placeholder', 'Choisir votre pays') }}
                                    </option>

                                    @foreach ($countries as $country)
                                        <option value="{{ $country }}" {{ $countryFieldValue === $country ? 'selected="selected"' : '' }}>
                                            {{ $country }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('financing.adresse_pays')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="loan-divider"></div>

                            <div class="form-group">
                                <x-form-input
                                    type="email"
                                    label="{{ translate(461) }}"
                                    name="financing.email"
                                    value="{{ old('financing.email', '') }}"
                                >
                                    <p class="form-comment m-0">
                                        <i class="fa text-theme fa-info-circle"></i>
                                        {{ translate(462) }}
                                    </p>
                                </x-form-input>
                            </div>

                            <div class="form-group">
                                <label class="loan-field-label">{{ translate(463) }}</label>

                                <div class="input-group loan-phone-input">
                                    <div class="input-group-prepend">
                                        <select
                                            id="phone-country-code"
                                            class="loan-phone-code-select"
                                            aria-label="{{ $loanPageText('phone_prefix_label', 'Indicatif téléphonique') }}"
                                            required
                                        >
                                            <option value="" disabled selected>
                                                {{ $loanPageText('phone_prefix_placeholder', 'Indicatif') }}
                                            </option>

                                            @foreach ($phoneDialCountries as $phoneCountry)
                                                <option
                                                    value="{{ $phoneCountry['iso'] }}"
                                                    data-iso="{{ $phoneCountry['iso'] }}"
                                                    data-dial-code="{{ $phoneCountry['dial_code'] }}"
                                                    data-country-value="{{ $phoneCountry['country_value'] }}"
                                                >
                                                    {{ $phoneCountry['flag'] }} {{ $phoneCountry['dial_code'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <input
                                        type="tel"
                                        inputmode="numeric"
                                        pattern="[0-9 ]*"
                                        id="visible-phone"
                                        class="form-control"
                                        required
                                        placeholder="{{ translate(464) }}"
                                        autocomplete="tel"
                                    >
                                </div>

                                <input type="hidden" name="financing[telephone]" id="real-phone" value="{{ old('financing.telephone', '') }}">

                                @error('financing.telephone')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <input type="hidden" name="financing[geo_city]" id="geoCity">
                            <input type="hidden" name="financing[geo_country]" id="geoCountry">
                            <input type="hidden" name="financing[geo_region]" id="geoRegion">

                            <div class="form-group mt-3">
                                <label class="loan-field-label">{{ translate(465) }}</label>

                                <div class="form-check-inline">
                                    <label class="form-check-label mr-10" for="gender_man">
                                        <input
                                            id="gender_man"
                                            class="form-check-input"
                                            type="radio"
                                            value="{{ translate(330) }}"
                                            {{ old('financing.sexe') == translate(330) ? 'checked="checked"' : null }}
                                            name="financing[sexe]"
                                            required="required"
                                        >
                                        {{ translate(330) }}
                                    </label>

                                    <label class="form-check-label" for="gender_woman">
                                        <input
                                            id="gender_woman"
                                            class="form-check-input"
                                            type="radio"
                                            value="{{ translate(331) }}"
                                            {{ old('financing.sexe') == translate(331) ? 'checked="checked"' : null }}
                                            name="financing[sexe]"
                                            required="required"
                                        >
                                        {{ translate(331) }}
                                    </label>
                                </div>
                            </div>

                            <div class="loan-checkbox-wrap">
                                <label for="fees_notice">
                                    <input id="fees_notice" name="fees_notice" type="checkbox" required>
                                    <span>{!! translate_with_loan_processing_fee(472) !!}</span>
                                </label>
                            </div>
                        </section>
                    </div>

                    <div class="loan-submit-box">
                        <button type="submit" class="readon submit">
                            {{ translate(468) }}
                        </button>

                        <p class="loan-submit-note">{{ translate(469) }}</p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-rs-cta></x-rs-cta>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const countrySelect = document.getElementById('address-country');
        const phoneCountrySelect = document.getElementById('phone-country-code');
        const visiblePhone = document.getElementById('visible-phone');
        const realPhone = document.getElementById('real-phone');
        const geoCity = document.getElementById('geoCity');
        const geoCountry = document.getElementById('geoCountry');
        const geoRegion = document.getElementById('geoRegion');
        const form = document.getElementById('loanForm');

        const amountButtons = document.querySelectorAll('.amount-btn');
        const amountHidden = document.getElementById('amountHidden');

        const durationButtons = document.querySelectorAll('.duration-btn');
        const dureeHidden = document.getElementById('dureeHidden');

        const liveMensualite = document.getElementById('liveMensualite');
        const liveTotal = document.getElementById('liveTotal');

        const submitBtn = form ? form.querySelector('button[type="submit"]') : null;
        const defaultSubmitText = submitBtn ? submitBtn.innerText : '';

        const tauxAnnuel = 3.75;
        const phoneDialCountries = @json($phoneDialCountries);
        const countryOptions = countrySelect ? Array.from(countrySelect.options) : [];
        let countryWasTouched = Boolean(countrySelect && countrySelect.value);
        let phoneWasTouched = Boolean(realPhone && realPhone.value.trim());

        function getCurrentAmount() {
            return parseFloat(amountHidden.value);
        }

        function getCurrentDuree() {
            return parseInt(dureeHidden.value);
        }

        function formatEuro(value) {
            return new Intl.NumberFormat(@json($loanNumberLocale), {
                style: 'currency',
                currency: 'EUR'
            }).format(value);
        }

        function normalizeCountry(value) {
            return String(value || '')
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .toLowerCase()
                .trim();
        }

        function getSelectedDialCode() {
            if (!phoneCountrySelect || !phoneCountrySelect.selectedOptions.length) {
                return '';
            }

            return phoneCountrySelect.selectedOptions[0].dataset.dialCode || '';
        }

        function syncPhone() {
            if (!realPhone || !visiblePhone) return;

            const prefix = getSelectedDialCode();
            const number = visiblePhone.value.trim();

            realPhone.value = prefix && number ? `${prefix} ${number}` : number;
        }

        function selectPhoneCountry(dialCode, isoCode) {
            if (!phoneCountrySelect) return false;

            const options = Array.from(phoneCountrySelect.options).filter(option => option.value);
            const normalizedDialCode = String(dialCode || '').replace(/\s+/g, '');
            const normalizedIsoCode = String(isoCode || '').toUpperCase();
            let option = null;

            if (normalizedIsoCode) {
                option = options.find(item => item.dataset.iso === normalizedIsoCode);
            }

            if (!option && normalizedDialCode) {
                option = options.find(item => item.dataset.dialCode === normalizedDialCode);
            }

            if (!option) {
                return false;
            }

            phoneCountrySelect.value = option.value;
            return true;
        }

        function hydratePhoneFromHidden() {
            if (!realPhone || !visiblePhone || !realPhone.value.trim()) {
                return;
            }

            const rawPhone = realPhone.value.trim();
            const compactPhone = rawPhone.replace(/[^\d+]/g, '');
            const phoneDigits = rawPhone.replace(/\D/g, '');
            const sortedCountries = phoneDialCountries
                .slice()
                .sort((a, b) => b.dial_code.length - a.dial_code.length);

            const detectedCountry = sortedCountries.find(country => {
                const dialCode = country.dial_code.replace(/\s+/g, '');
                const dialDigits = dialCode.replace(/\D/g, '');

                return compactPhone.startsWith(dialCode) || phoneDigits.startsWith(dialDigits);
            });

            if (!detectedCountry) {
                visiblePhone.value = rawPhone;
                return;
            }

            selectPhoneCountry(detectedCountry.dial_code, detectedCountry.iso);

            const dialDigits = detectedCountry.dial_code.replace(/\D/g, '');
            const localDigits = phoneDigits.startsWith(dialDigits)
                ? phoneDigits.slice(dialDigits.length)
                : phoneDigits;

            visiblePhone.value = localDigits.replace(/(\d{2})(?=\d)/g, '$1 ').trim();
            syncPhone();
        }

        function setCountryFromGeo(data) {
            if (!countrySelect || countryWasTouched || countrySelect.value) {
                return;
            }

            const isoCode = String(data.country_code || data.country_code_iso2 || '').toUpperCase();
            const countryFromIso = phoneDialCountries.find(country => country.iso === isoCode);
            const detectedCountry = (countryFromIso && countryFromIso.country_value)
                ? countryFromIso.country_value
                : data.country_name;

            if (!detectedCountry) {
                return;
            }

            const option = countryOptions.find(item => normalizeCountry(item.value) === normalizeCountry(detectedCountry));

            if (option) {
                countrySelect.value = option.value;
            }
        }

        function pulseValue(el) {
            if (!el) return;
            el.style.transform = 'scale(1.05)';
            setTimeout(() => {
                el.style.transform = 'scale(1)';
            }, 150);
        }

        function lockSubmitButton() {
            if (!submitBtn) return;
            submitBtn.disabled = true;
            submitBtn.innerText = '{{ translate(488) }}';
        }

        function unlockSubmitButton() {
            if (!submitBtn) return;
            submitBtn.disabled = false;
            submitBtn.innerText = defaultSubmitText;
            form.dataset.submitted = 'false';
        }

        function updateLiveSimulation() {
            const montant = getCurrentAmount();
            const duree = getCurrentDuree();

            if (isNaN(montant) || montant < 3000 || isNaN(duree) || duree <= 0) {
                liveMensualite.textContent = '—';
                liveTotal.textContent = '—';
                return;
            }

            const tauxMensuel = tauxAnnuel / 12 / 100;
            let mensualite = 0;

            if (tauxMensuel > 0) {
                mensualite = montant * (tauxMensuel / (1 - Math.pow(1 + tauxMensuel, -duree)));
            } else {
                mensualite = montant / duree;
            }

            mensualite = Math.round(mensualite * 100) / 100;
            const total = Math.round((mensualite * duree) * 100) / 100;

            liveMensualite.textContent = formatEuro(mensualite);
            liveTotal.textContent = formatEuro(total);

            pulseValue(liveMensualite);
            pulseValue(liveTotal);
        }

        function syncActiveAmountButton() {
            amountButtons.forEach(btn => {
                btn.classList.toggle('active', btn.dataset.value === amountHidden.value);
            });
        }

        function syncActiveDurationButton() {
            durationButtons.forEach(btn => {
                btn.classList.toggle('active', btn.dataset.value === dureeHidden.value);
            });
        }

        amountButtons.forEach(btn => {
            btn.addEventListener('click', function () {
                amountHidden.value = this.dataset.value;
                syncActiveAmountButton();
                updateLiveSimulation();
            });
        });

        durationButtons.forEach(btn => {
            btn.addEventListener('click', function () {
                dureeHidden.value = this.dataset.value;
                syncActiveDurationButton();
                updateLiveSimulation();
            });
        });

        if (countrySelect) {
            countrySelect.addEventListener('change', function () {
                countryWasTouched = true;
            });
        }

        if (phoneCountrySelect) {
            phoneCountrySelect.addEventListener('change', function () {
                phoneWasTouched = true;
                syncPhone();
            });
        }

        if (visiblePhone) {
            visiblePhone.addEventListener('input', syncPhone);
        }

        hydratePhoneFromHidden();

        fetch('https://ipapi.co/json/')
            .then(res => res.json())
            .then(data => {
                const isoCode = String(data.country_code || data.country_code_iso2 || '').toUpperCase();

                if (data.country_calling_code && phoneCountrySelect && !phoneWasTouched && !phoneCountrySelect.value) {
                    selectPhoneCountry(data.country_calling_code, isoCode);
                    syncPhone();
                }

                setCountryFromGeo(data);

                if (geoCity) geoCity.value = data.city || '';
                if (geoCountry) geoCountry.value = data.country_name || '';
                if (geoRegion) geoRegion.value = data.region || '';
            })
            .catch(err => console.error('Erreur géo:', err));

        form.addEventListener('submit', function (e) {
            if (form.dataset.submitted === 'true') {
                e.preventDefault();
                return;
            }

            form.dataset.submitted = 'true';
            lockSubmitButton();

            syncPhone();

            const montant = getCurrentAmount();
            const duree = getCurrentDuree();

            const montantErrorId = 'montant-error';
            const dureeErrorId = 'duree-error';

            let montantErrorEl = document.getElementById(montantErrorId);
            let dureeErrorEl = document.getElementById(dureeErrorId);

            if (montantErrorEl) montantErrorEl.remove();
            if (dureeErrorEl) dureeErrorEl.remove();

            if (isNaN(montant) || montant < 3000) {
                e.preventDefault();
                unlockSubmitButton();

                montantErrorEl = document.createElement('div');
                montantErrorEl.id = montantErrorId;
                montantErrorEl.className = 'alert alert-danger mt-2';
                montantErrorEl.textContent = @json($loanPageText('amount_error', 'Sélectionnez un montant valide.'));
                document.getElementById('amountGrid').insertAdjacentElement('afterend', montantErrorEl);
                window.scrollTo({
                    top: document.getElementById('amountGrid').getBoundingClientRect().top + window.scrollY - 120,
                    behavior: 'smooth'
                });
                return;
            }

            if (isNaN(duree) || duree <= 0) {
                e.preventDefault();
                unlockSubmitButton();

                dureeErrorEl = document.createElement('div');
                dureeErrorEl.id = dureeErrorId;
                dureeErrorEl.className = 'alert alert-danger mt-2';
                dureeErrorEl.textContent = @json($loanPageText('duration_error', 'Sélectionnez la durée de votre prêt.'));
                document.getElementById('durationGrid').insertAdjacentElement('afterend', dureeErrorEl);
                window.scrollTo({
                    top: document.getElementById('durationGrid').getBoundingClientRect().top + window.scrollY - 120,
                    behavior: 'smooth'
                });
                return;
            }
        });

        syncActiveAmountButton();
        syncActiveDurationButton();
        updateLiveSimulation();
    });
</script>
   
@endsection
