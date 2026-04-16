<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ translate(547) }}</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        }

        .header {
            background-color: #28a745;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 22px;
            font-weight: 800;
        }

        .content {
            padding: 22px;
            color: #333;
            line-height: 1.7;
        }

        .content p {
            margin: 0 0 14px;
            font-size: 15px;
        }

        .reference-box {
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 18px;
            margin: 20px 0;
        }

        .reference-label {
            font-size: 12px;
            color: #6b7280;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 6px;
        }

        .reference-value {
            font-size: 22px;
            font-weight: 800;
            color: #111827;
            word-break: break-word;
            user-select: all;
            cursor: text;
        }

        .reference-help {
            margin-top: 10px;
            font-size: 13px;
            color: #6b7280;
        }

        .footer {
            background: #f5f5f5;
            text-align: center;
            padding: 14px;
            font-size: 13px;
            color: #888;
            border-top: 1px solid #eee;
        }

        a {
            color: #2563eb;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="email-container">

        <div class="header">
            <h1>{{ translate(547) }}</h1>
        </div>

        <div class="content">

            @php
                $hour = now()->hour;
                $greeting = $hour < 18 ? 501 : 502;
            @endphp

            <p>{{ translate($greeting) }} <strong>{{ $fullname }}</strong>,</p>

            <p>{{ translate(548) }}</p>

            <p>{{ translate(549) }}</p>

            <div class="reference-box">
                <div class="reference-label">{{ translate(492) }}</div>
                <div class="reference-value">#{{ $request_id ?? '-' }}</div>

                <div class="reference-help">
                    {{ translate(551) }}<br>
                    <strong>{{ translate(553) }}</strong>
                </div>
            </div>

            <p>{{ translate(550) }}</p>

            <p>
                {{ translate(552) }}
                <a href="mailto:{{ SITE_EMAIL }}">{{ SITE_EMAIL }}</a>
                {{ translate(498) }}
                <a href="https://wa.me/{{ SITE_PHONE }}" target="_blank">{{ SITE_PHONE }}</a>.
            </p>

            <p>
                {{ translate(499) }},<br>
                <strong>{{ translate(500) }}</strong>
            </p>

        </div>

        <div class="footer">
            &copy; {{ date('Y') }} {{ SITE_NAME }} — {{ translate(372) }}
        </div>

    </div>
</body>
</html>