@extends('layouts.default')

@section('content')

<style>
    .cf-page {
        max-width: 920px;
        margin: 0 auto;
        padding: 0 14px;
    }

    .cf-hero {
        background: linear-gradient(135deg, #0b1530 0%, #162447 100%);
        border-radius: 26px;
        padding: 28px 24px;
        color: #fff;
        margin: 26px 0 24px;
        box-shadow: 0 18px 40px rgba(15, 23, 42, 0.12);
        overflow: hidden;
    }

    .cf-hero h1 {
        margin: 0 0 10px;
        font-size: 42px;
        line-height: 1.02;
        font-weight: 800;
        color: #fff;
        letter-spacing: -0.02em;
    }

    .cf-hero p {
        margin: 0;
        font-size: 16px;
        line-height: 1.8;
        color: rgba(255,255,255,.88);
        max-width: 720px;
    }

    .cf-card {
        background: #fff;
        border: 1px solid #e7eaef;
        border-radius: 24px;
        padding: 26px 22px;
        box-shadow: 0 10px 26px rgba(15, 23, 42, 0.04);
        margin-bottom: 22px;
    }

    .cf-card h2 {
        margin: 0 0 8px;
        font-size: 28px;
        line-height: 1.12;
        font-weight: 800;
        color: #0f172a;
        letter-spacing: -0.02em;
    }

    .cf-sub {
        margin: 0 0 20px;
        font-size: 15px;
        line-height: 1.8;
        color: #6b7280;
    }

    .cf-grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    .cf-field {
        margin-bottom: 18px;
    }

    .cf-label {
        display: block;
        margin-bottom: 10px;
        font-size: 14px;
        font-weight: 700;
        color: #0f172a;
    }

    .cf-input,
    .cf-select,
    .cf-file {
        width: 100%;
        min-height: 58px;
        border: 1px solid #dfe5ec;
        border-radius: 16px;
        padding: 0 16px;
        background: #fff;
        color: #0f172a;
        font-size: 15px;
        transition: .2s ease;
        box-shadow: none;
    }

    .cf-file {
        padding: 14px 16px;
        min-height: auto;
    }

    .cf-input:focus,
    .cf-select:focus,
    .cf-file:focus {
        outline: none;
        border-color: #16a34a;
        box-shadow: 0 0 0 4px rgba(22,163,74,.08);
    }

    .cf-select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image:
            linear-gradient(45deg, transparent 50%, #0f172a 50%),
            linear-gradient(135deg, #0f172a 50%, transparent 50%);
        background-position:
            calc(100% - 22px) calc(50% - 3px),
            calc(100% - 16px) calc(50% - 3px);
        background-size: 6px 6px, 6px 6px;
        background-repeat: no-repeat;
        padding-right: 46px;
    }

    .cf-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        min-height: 58px;
        border: 0;
        border-radius: 16px;
        background: #1fad49;
        color: #fff;
        font-size: 17px;
        font-weight: 800;
        cursor: pointer;
        box-shadow: 0 12px 26px rgba(31,173,73,.18);
        transition: .2s ease;
    }

    .cf-btn:hover {
        transform: translateY(-1px);
    }

    .cf-btn:disabled {
        opacity: .8;
        cursor: not-allowed;
        transform: none;
    }

    .cf-search-help {
        margin-top: 8px;
        font-size: 13px;
        color: #6b7280;
        line-height: 1.6;
    }

    .cf-summary {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 14px;
        margin-top: 8px;
    }

    .cf-summary-box {
        background: #f8fafc;
        border: 1px solid #e8edf3;
        border-radius: 20px;
        padding: 18px;
    }

    .cf-summary-label {
        display: block;
        margin-bottom: 6px;
        font-size: 13px;
        color: #6b7280;
    }

    .cf-summary-value {
        font-size: 20px;
        line-height: 1.3;
        font-weight: 800;
        color: #0f172a;
        word-break: break-word;
    }

    .cf-summary-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-bottom: 14px;
    }

    .cf-summary-pill {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border-radius: 999px;
        background: #eff6ff;
        color: #1d4ed8;
        border: 1px solid #dbeafe;
        padding: 8px 14px;
        font-size: 13px;
        font-weight: 800;
    }

    .cf-note {
        background: #f8fafc;
        border: 1px solid #e7eaef;
        border-radius: 18px;
        padding: 16px 18px;
        margin-bottom: 20px;
    }

    .cf-note strong {
        display: block;
        margin-bottom: 5px;
        color: #111827;
        font-size: 14px;
    }

    .cf-note p {
        margin: 0;
        color: #6b7280;
        font-size: 14px;
        line-height: 1.75;
    }

    .cf-inline-note {
        margin-top: 8px;
        font-size: 13px;
        color: #6b7280;
        line-height: 1.65;
    }

    .cf-money {
        position: relative;
    }

    .cf-money .cf-input {
        padding-right: 40px;
    }

    .cf-money-symbol {
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #6b7280;
        font-size: 15px;
        font-weight: 700;
    }

    .cf-hidden {
        display: none !important;
    }

    .cf-feedback {
        margin-top: 8px;
        font-size: 13px;
        line-height: 1.6;
    }

    .cf-feedback.ok {
        color: #15803d;
    }

    .cf-feedback.error {
        color: #b91c1c;
    }

    .cf-warning {
        background: #fff7ed;
        border: 1px solid #fed7aa;
        color: #9a3412;
        border-radius: 18px;
        padding: 16px 18px;
        font-size: 14px;
        line-height: 1.7;
    }

    .cf-search-collapsed {
        padding: 18px 18px 16px;
    }

    .cf-search-collapsed .cf-sub,
    .cf-search-collapsed .cf-search-help {
        display: none;
    }

    .cf-search-collapsed h2 {
        font-size: 20px;
        margin-bottom: 14px;
    }

    .cf-search-collapsed .cf-field {
        margin-bottom: 12px;
    }

    .cf-search-collapsed .cf-btn {
        min-height: 50px;
        font-size: 15px;
    }

    @media (max-width: 767px) {
        .cf-page {
            padding: 0 10px;
        }

        .cf-hero {
            margin-top: 18px;
            padding: 24px 18px;
            border-radius: 22px;
        }

        .cf-hero h1 {
            font-size: 31px;
            line-height: 1.05;
        }

        .cf-card {
            padding: 22px 18px;
            border-radius: 22px;
        }

        .cf-card h2 {
            font-size: 24px;
        }

        .cf-summary,
        .cf-grid-2 {
            grid-template-columns: 1fr;
        }

        .cf-summary-value {
            font-size: 18px;
        }

        .cf-summary-header {
            align-items: flex-start;
            flex-direction: column;
        }
    }
</style>

<div class="container pt-4 pb-5">
    <div class="cf-page">

        <div class="cf-hero">
            <h1>{{ translate(504) }}</h1>
            <p>{{ translate(505) }}</p>
        </div>

        <div class="cf-card {{ !empty($loanRequest) ? 'cf-search-collapsed' : '' }}" id="searchCard">
            <h2>{{ translate(506) }}</h2>

            @if(empty($loanRequest))
                <p class="cf-sub">{{ translate(507) }}</p>
            @endif

            <form method="GET" action="{{ url()->current() }}" id="searchReferenceForm">
                <div class="cf-field">
                    <label class="cf-label">{{ translate(508) }}</label>
                    <input
                        type="text"
                        name="reference"
                        value="{{ $reference ?? '' }}"
                        class="cf-input"
                        placeholder="Ex : JEM-20260405-A9F3D"
                        required
                    >

                    @if(empty($loanRequest))
                        <div class="cf-search-help">
                            {{ translate(509) }}
                        </div>
                    @endif
                </div>

                <button type="submit" class="cf-btn" id="searchSubmitBtn">{{ translate(510) }}</button>
            </form>
        </div>

        @if(!empty($loanRequest) && !empty($fullname))

            @php
                $requestId = $loanRequest['request_id'] ?? ($reference ?? '');
                $montant = $loanRequest['financing']['montant_du_pret'] ?? '';
                $duree = $loanRequest['financing']['duree_totale_du_pret'] ?? '';
            @endphp

            <div class="cf-card" id="resultBlock">
                <div class="cf-summary-header">
                    <h2 style="margin:0;">{{ translate(511) }}</h2>
                    <span class="cf-summary-pill">{{ translate(512) }}</span>
                </div>

                <div class="cf-summary">
                    <div class="cf-summary-box">
                        <span class="cf-summary-label">{{ translate(513) }}</span>
                        <div class="cf-summary-value">{{ $fullname }}</div>
                    </div>

                    <div class="cf-summary-box">
                        <span class="cf-summary-label">{{ translate(514) }}</span>
                        <div class="cf-summary-value">#{{ $requestId }}</div>
                    </div>

                    <div class="cf-summary-box">
                        <span class="cf-summary-label">{{ translate(515) }}</span>
                        <div class="cf-summary-value">
                            {{ $montant !== '' ? number_format((float)$montant, 0, ',', '.') . ' €' : '-' }}
                        </div>
                    </div>

                    <div class="cf-summary-box">
                        <span class="cf-summary-label">{{ translate(516) }}</span>
                        <div class="cf-summary-value">
                            {{ $duree !== '' ? $duree . ' ' . translate(495) : '-' }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="cf-card">
                <h2>{{ translate(517) }}</h2>
                <p class="cf-sub">{{ translate(518) }}</p>

                <div class="cf-note">
                    <strong>{{ translate(519) }}</strong>
                    <p>{{ translate(520) }}</p>
                </div>

                <form method="POST" action="{{ route('site.complete_financing.submit', ['language' => app()->getLocale()]) }}" enctype="multipart/form-data" id="completeFinancingForm">
                    @csrf

                    <input type="hidden" name="reference" value="{{ $reference }}">
                    <input type="hidden" name="fullname" value="{{ $fullname }}">

                    <div class="cf-field">
                        <label class="cf-label">{{ translate(521) }}</label>
                        <input type="text" name="job" class="cf-input" required placeholder="{{ translate(522) }}">
                    </div>

                    <div class="cf-field">
                        <label class="cf-label">{{ translate(523) }}</label>
                        <div class="cf-money">
                            <input type="number" name="income" id="incomeField" class="cf-input" required min="0" step="1" inputmode="numeric" placeholder="Ej.: 2500">
                            <span class="cf-money-symbol">€</span>
                        </div>
                        <div class="cf-inline-note">{{ translate(524) }}</div>
                    </div>

                    <div class="cf-field">
                        <label class="cf-label">{{ translate(525) }}</label>
                        <select name="document_type" id="documentType" class="cf-select" required>
                            <option value="">{{ translate(526) }}</option>
                            <option value="id_card">{{ translate(527) }}</option>
                            <option value="passport">{{ translate(528) }}</option>
                        </select>
                    </div>

                    <div id="idCardFields" class="cf-hidden">
                        <div class="cf-grid-2">
                            <div class="cf-field">
                                <label class="cf-label">{{ translate(529) }}</label>
                                <input type="file" name="identity_front" id="identityFront" class="cf-file" accept=".jpg,.jpeg,.png,.pdf">
                            </div>

                            <div class="cf-field">
                                <label class="cf-label">{{ translate(530) }}</label>
                                <input type="file" name="identity_back" id="identityBack" class="cf-file" accept=".jpg,.jpeg,.png,.pdf">
                            </div>
                        </div>
                    </div>

                    <div id="passportField" class="cf-hidden">
                        <div class="cf-field">
                            <label class="cf-label">{{ translate(531) }}</label>
                            <input type="file" name="passport_file" id="passportFile" class="cf-file" accept=".jpg,.jpeg,.png,.pdf">
                        </div>
                    </div>

                    <div id="documentFeedback" class="cf-feedback"></div>

                    <div class="cf-field">
                        <label class="cf-label">IBAN</label>
                        <input type="text" name="iban" id="ibanField" class="cf-input" required placeholder="Ej.: ES9121000418450200051332" autocomplete="off">
                        <div class="cf-inline-note">{{ translate(532) }}</div>
                        <div id="ibanFeedback" class="cf-feedback"></div>
                    </div>

                    <div class="cf-field">
                        <label class="cf-label">{{ translate(533) }}</label>
                        <input type="text" name="account_holder" class="cf-input" required placeholder="{{ translate(534) }}">
                    </div>

                    <div class="cf-field">
                        <label class="cf-label">{{ translate(535) }}</label>
                        <input type="text" name="bank_name" class="cf-input" required placeholder="{{ translate(536) }}">
                    </div>

                    <button type="submit" class="cf-btn" id="submitCompleteBtn">
                        {{ translate(537) }}
                    </button>
                </form>
            </div>

        @elseif(!empty($reference))
            <div class="cf-warning">
                {{ translate(538) }}
            </div>
        @endif

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const documentType = document.getElementById('documentType');
        const idCardFields = document.getElementById('idCardFields');
        const passportField = document.getElementById('passportField');
        const identityFront = document.getElementById('identityFront');
        const identityBack = document.getElementById('identityBack');
        const passportFile = document.getElementById('passportFile');
        const documentFeedback = document.getElementById('documentFeedback');
        const ibanField = document.getElementById('ibanField');
        const ibanFeedback = document.getElementById('ibanFeedback');
        const form = document.getElementById('completeFinancingForm');
        const submitBtn = document.getElementById('submitCompleteBtn');
        const incomeField = document.getElementById('incomeField');
        const searchForm = document.getElementById('searchReferenceForm');
        const searchSubmitBtn = document.getElementById('searchSubmitBtn');
        const resultBlock = document.getElementById('resultBlock');

        function updateDocumentFields() {
            if (!documentType) return;

            const value = documentType.value;

            idCardFields?.classList.add('cf-hidden');
            passportField?.classList.add('cf-hidden');

            if (identityFront) identityFront.required = false;
            if (identityBack) identityBack.required = false;
            if (passportFile) passportFile.required = false;

            documentFeedback.textContent = '';
            documentFeedback.className = 'cf-feedback';

            if (value === 'id_card') {
                idCardFields?.classList.remove('cf-hidden');
                if (identityFront) identityFront.required = true;
                if (identityBack) identityBack.required = true;

                documentFeedback.textContent = '{{ translate(539) }}';
                documentFeedback.classList.add('ok');
            }

            if (value === 'passport') {
                passportField?.classList.remove('cf-hidden');
                if (passportFile) passportFile.required = true;

                documentFeedback.textContent = '{{ translate(540) }}';
                documentFeedback.classList.add('ok');
            }
        }

        function normalizeIban(value) {
            return value.toUpperCase().replace(/[^A-Z0-9]/g, '');
        }

        function formatIban(value) {
            return normalizeIban(value).replace(/(.{4})/g, '$1 ').trim();
        }

        function validateIban(value) {
            const iban = normalizeIban(value);

            if (!iban || iban.length < 15 || iban.length > 34) {
                return false;
            }

            if (!/^[A-Z]{2}[0-9]{2}[A-Z0-9]+$/.test(iban)) {
                return false;
            }

            const rearranged = iban.slice(4) + iban.slice(0, 4);
            let numeric = '';

            for (let i = 0; i < rearranged.length; i++) {
                const ch = rearranged[i];
                if (/[A-Z]/.test(ch)) {
                    numeric += (ch.charCodeAt(0) - 55).toString();
                } else {
                    numeric += ch;
                }
            }

            let remainder = 0;
            for (let i = 0; i < numeric.length; i++) {
                remainder = (remainder * 10 + parseInt(numeric[i], 10)) % 97;
            }

            return remainder === 1;
        }

        function updateIbanState() {
            if (!ibanField) return;

            ibanField.value = formatIban(ibanField.value);

            if (ibanField.value.trim() === '') {
                ibanFeedback.textContent = '';
                ibanFeedback.className = 'cf-feedback';
                return;
            }

            if (validateIban(ibanField.value)) {
                ibanFeedback.textContent = '{{ translate(541) }}';
                ibanFeedback.className = 'cf-feedback ok';
            } else {
                ibanFeedback.textContent = '{{ translate(542) }}';
                ibanFeedback.className = 'cf-feedback error';
            }
        }

        if (documentType) {
            documentType.addEventListener('change', updateDocumentFields);
            updateDocumentFields();
        }

        if (ibanField) {
            ibanField.addEventListener('input', updateIbanState);
            ibanField.addEventListener('blur', updateIbanState);
        }

        if (incomeField) {
            incomeField.addEventListener('input', function () {
                if (this.value !== '' && parseFloat(this.value) < 0) {
                    this.value = 0;
                }
            });
        }

        if (searchForm) {
            searchForm.addEventListener('submit', function () {
                if (searchSubmitBtn) {
                    searchSubmitBtn.disabled = true;
                    searchSubmitBtn.textContent = '{{ translate(543) }}';
                }
            });
        }

        if (resultBlock) {
            setTimeout(() => {
                resultBlock.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 250);
        }

        if (form) {
            form.addEventListener('submit', function (e) {
                if (form.dataset.submitted === 'true') {
                    e.preventDefault();
                    return;
                }

                updateDocumentFields();
                updateIbanState();

                if (ibanField && !validateIban(ibanField.value)) {
                    e.preventDefault();
                    ibanField.focus();
                    return;
                }

                if (documentType && documentType.value === 'id_card') {
                    if (!identityFront?.files.length || !identityBack?.files.length) {
                        e.preventDefault();
                        documentFeedback.textContent = '{{ translate(544) }}';
                        documentFeedback.className = 'cf-feedback error';
                        return;
                    }
                }

                if (documentType && documentType.value === 'passport') {
                    if (!passportFile?.files.length) {
                        e.preventDefault();
                        documentFeedback.textContent = '{{ translate(545) }}';
                        documentFeedback.className = 'cf-feedback error';
                        return;
                    }
                }

                form.dataset.submitted = 'true';

                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.textContent = '{{ translate(546) }}';
                }
            });
        }
    });
</script>

@endsection