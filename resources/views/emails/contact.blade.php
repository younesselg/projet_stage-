<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nouveau message de contact</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2 style="color: #2c3e50; border-bottom: 2px solid #3498db; padding-bottom: 10px;">Nouveau message de contact</h2>
        
        <div style="margin: 20px 0;">
            <p><strong style="color: #2c3e50;">Nom:</strong> {{ $nom }}</p>
            <p><strong style="color: #2c3e50;">Email:</strong> {{ $email }}</p>
            <p><strong style="color: #2c3e50;">Téléphone:</strong> {{ $telephone }}</p>
            <p><strong style="color: #2c3e50;">Message:</strong></p>
            <div style="background-color: #f8f9fa; padding: 15px; border-radius: 5px; margin-top: 10px;">
                {{ $message }}
            </div>
        </div>
        
        <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee; font-size: 12px; color: #666;">
            <p>Ce message a été envoyé depuis le formulaire de contact du site web.</p>
        </div>
    </div>
</body>
</html> 