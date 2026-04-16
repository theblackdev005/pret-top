<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Finaver') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin:0;padding:0;background-color:#f4f4f4;font-family:Arial, Helvetica, sans-serif;color:#111111;">

    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="width:100%;background-color:#f4f4f4;margin:0;padding:0;">
        <tr>
            <td align="center" style="padding:20px 12px;">

                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="width:100%;max-width:640px;background-color:#ffffff;margin:0 auto;">
                    
                    <tr>
                        <td style="padding:28px 20px 12px 20px;text-align:center;font-size:22px;line-height:1.3;font-weight:700;color:#1e293b;">
                            {{ config('app.name', 'Finaver') }}
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:20px;">
                            @yield('content')
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:18px 20px 28px 20px;text-align:center;font-size:12px;line-height:1.6;color:#6b7280;border-top:1px solid #e5e7eb;">
                            {!! site_copyright() !!}
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>