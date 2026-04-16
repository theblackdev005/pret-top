@extends('layouts.default')

@section('content')
    <x-breadcrumb></x-breadcrumb>

    <script>
      gtag('event', 'ads_conversion_Pr_sentation_1', {
        // <event_parameters>
      });
    </script>

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
        }
    </style>

    <div class="rs-contact contact-style3 pt-5 md-pt-80 mb-5">
        <div class="container">
            <div class="loan-modern-shell">
                <x-alert only="success"></x-alert>
                <x-alert only="error"></x-alert>

                <div class="loan-hero">
                    <h1>{{ translate(473) }}</h1>

                    {{-- <div class="loan-hero-notice">
                        <div class="loan-hero-notice-title">{{ translate(375) }}</div>
                        <p class="loan-hero-notice-text">{{ translate(475) }}</p>
                    </div> --}}
                </div>

                <form action="{{ routeWithLocale('site.obtain_financing') }}" method="post" id="loanForm">
                    @csrf

                    <input type="hidden" name="financing[devise_du_pret]" value="EUR">

                    <div class="loan-grid">
                        <section class="loan-card">
                            <span class="loan-mini-tag">
                                {{ app()->getLocale() === 'es' ? 'Financiación' : 'Financement' }}
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
                                            {{ app()->getLocale() === 'es'
                                                ? '✔ Cálculo inmediato sin compromiso'
                                                : '✔ Calcul immédiat sans engagement' }}
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
                                {{ app()->getLocale() === 'es' ? 'Identidad' : 'Identité' }}
                            </span>

                            <h3 class="loan-card-title">{{ translate(455) }}</h3>

                            <p class="loan-card-subtitle">
                                {{ app()->getLocale() === 'es'
                                    ? 'Complete sus datos para que podamos validar su expediente.'
                                    : 'Complétez vos informations afin que nous puissions valider votre dossier.' }}
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
                                <x-form-select
                                    :options="$countries"
                                    selectLabel="{{ translate(460) }}"
                                    name="financing.adresse_pays"
                                    :defaultValue="old('financing.adresse_pays', $countries[0]['code'] ?? ($countries[42] ?? ''))"
                                />
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

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="country-code">+</span>
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

                            {{-- <div class="loan-checkbox-wrap">
                                <label for="fees_notice">
                                    <input id="fees_notice" type="checkbox">
                                    <span>{{ translate(472) }}</span>
                                </label>
                            </div> --}}
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
        const prefixEl = document.getElementById('country-code');
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

        function getCurrentAmount() {
            return parseFloat(amountHidden.value);
        }

        function getCurrentDuree() {
            return parseInt(dureeHidden.value);
        }

        function formatEuro(value) {
            return new Intl.NumberFormat('{{ app()->getLocale() === "es" ? "es-ES" : "fr-FR" }}', {
                style: 'currency',
                currency: 'EUR'
            }).format(value);
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

        fetch('https://ipapi.co/json/')
            .then(res => res.json())
            .then(data => {
                if (data.country_calling_code && prefixEl) {
                    prefixEl.textContent = data.country_calling_code;
                }
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

            const prefix = prefixEl.textContent.trim();
            const number = visiblePhone.value.trim();

            if (prefix && number) {
                realPhone.value = prefix + ' ' + number;
            }

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
                montantErrorEl.textContent = '{{ app()->getLocale() === "es" ? "Seleccione un importe válido." : "Sélectionnez un montant valide." }}';
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
                dureeErrorEl.textContent = '{{ app()->getLocale() === "es" ? "Seleccione la duración de su préstamo." : "Sélectionnez la durée de votre prêt." }}';
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
