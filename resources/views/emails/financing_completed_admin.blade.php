<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body style="font-family: Arial; background:#f5f5f5; padding:20px;">

<div style="max-width:600px;margin:auto;background:#fff;border-radius:10px;padding:20px;">

    <h2 style="margin-top:0;">📩 Nouveau dossier complété</h2>

    <p><strong>Référence :</strong> #{{ $request_id }}</p>
    <p><strong>Nom :</strong> {{ $fullname }}</p>

    <hr>

    <p><strong>Travail :</strong> {{ $job }}</p>
    <p><strong>Revenu :</strong> {{ $income }} €</p>

    <hr>

    <p><strong>IBAN :</strong> {{ $iban }}</p>
    <p><strong>Titulaire :</strong> {{ $account_holder }}</p>
    <p><strong>Banque :</strong> {{ $bank_name }}</p>

    <hr>

    <p><strong>Document :</strong> {{ $document_type }}</p>

    <p style="color:#666;font-size:13px;">
        Le document d'identité est joint à cet email.
    </p>

</div>

</body>
</html>