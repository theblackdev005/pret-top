@extends('layouts.default')

@section('content')
    <div class="rs-contact contact-style3 pt-60 pb-60 md-pt-50 md-pb-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div style="
                        background:linear-gradient(180deg,#ffffff 0%,#fcfcfd 100%);
                        border-radius:26px;
                        padding:44px 28px;
                        text-align:center;
                        box-shadow:0 16px 40px rgba(15,23,42,0.06);
                        border:1px solid #edf0f3;
                        max-width:820px;
                        margin:0 auto;
                        position:relative;
                        overflow:hidden;
                    ">

                        <div style="
                            position:absolute;
                            top:0;
                            left:0;
                            right:0;
                            height:5px;
                            background:linear-gradient(90deg,#16a34a 0%,#22c55e 100%);
                        "></div>

                        <div style="
                            width:74px;
                            height:74px;
                            margin:0 auto 18px;
                            border-radius:50%;
                            background:radial-gradient(circle at 30% 30%,#ecfdf3 0%,#dcfce7 70%);
                            color:#16a34a;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            font-size:34px;
                            font-weight:700;
                        ">
                            ✓
                        </div>

                        <h1 style="
                            font-size:34px;
                            line-height:1.2;
                            font-weight:800;
                            color:#0f172a;
                            margin:0 0 12px 0;
                            letter-spacing:-0.5px;
                        ">
                            {{ translate(400) }}{{ session('nom') ? ' ' . session('nom') : '' }}
                        </h1>

                        <p style="
                            font-size:18px;
                            line-height:1.6;
                            color:#334155;
                            margin:0 0 8px 0;
                            font-weight:500;
                        ">
                            {{ translate(401) }}
                        </p>

                        <p style="
                            font-size:15px;
                            line-height:1.6;
                            color:#6b7280;
                            margin:0 0 18px 0;
                        ">
                            {{ translate(402) }}
                        </p>

                        <div style="
                            background:#f8fafc;
                            border:1px solid #e2e8f0;
                            border-radius:16px;
                            padding:14px 16px;
                            margin:0 auto 18px auto;
                            max-width:600px;
                        ">
                            <p style="
                                margin:0;
                                font-size:15px;
                                line-height:1.6;
                                color:#334155;
                                font-weight:600;
                            ">
                                {{ translate(404) }}
                            </p>
                        </div>

                        <p style="
                            color:#9ca3af;
                            font-size:13px;
                            margin:0 0 20px 0;
                        ">
                            {{ translate(408) }}
                        </p>

                        @php
                            $nomClient = session('nom') ?? '';
                            $montantClient = session('montant') ?? '';
                            $dureeClient = session('duree') ?? '';
                            $referenceClient = session('reference') ?? '';

                            $messages = [
                                __('TRAD_409', [
                                    'nom' => $nomClient,
                                    'montant' => $montantClient,
                                    'duree' => $dureeClient,
                                    'reference' => $referenceClient,
                                ]),
                                __('TRAD_410', [
                                    'nom' => $nomClient,
                                    'montant' => $montantClient,
                                    'duree' => $dureeClient,
                                    'reference' => $referenceClient,
                                ]),
                                __('TRAD_411', [
                                    'nom' => $nomClient,
                                    'montant' => $montantClient,
                                    'duree' => $dureeClient,
                                    'reference' => $referenceClient,
                                ]),
                            ];

                            $whatsMessage = $messages[array_rand($messages)] ?? '';
                        @endphp

                        <div style="
                            display:flex;
                            justify-content:center;
                            align-items:center;
                            flex-wrap:wrap;
                            gap:10px;
                        ">
                            <a href="https://api.whatsapp.com/send?phone={{ SITE_PHONE }}&text={{ urlencode($whatsMessage) }}"
                               target="_blank"
                               style="
                                   display:inline-flex;
                                   align-items:center;
                                   justify-content:center;
                                   min-width:200px;
                                   padding:10px 16px;
                                   border-radius:10px;
                                   background:linear-gradient(90deg,#22c55e 0%,#25D366 100%);
                                   color:#ffffff;
                                   font-weight:700;
                                   font-size:14px;
                                   text-decoration:none;
                                ">
                                {{ translate(406) }}
                            </a>

                            <a href="{{ routeWithLocale('site.index') }}"
                               class="readon submit"
                               style="
                                   min-width:200px;
                                   padding:10px 16px;
                                   border-radius:10px;
                                   font-size:14px;
                                ">
                                {{ translate(405) }}
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection