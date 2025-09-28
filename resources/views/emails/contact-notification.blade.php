<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f9f9f9; color: #333; }
        .container { max-width: 600px; margin: 20px auto; background: #fff; padding: 20px; border-radius: 8px; }
        h2 { color: #32B768; }
        p { line-height: 1.6; }
        .footer { margin-top: 20px; font-size: 12px; color: #777; }
    </style>
</head>
<body>
    <div class="container">
        <h2>🚨 New Contact Form Submission</h2>
        <p><strong>Name:</strong> {{ $name }}</p>
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Phone:</strong> {{ $phone ?? 'N/A' }}</p>
        <p><strong>Message:</strong></p>
        <blockquote>{{ $message }}</blockquote>
        <div class="footer">📩 AtoZ Website</div>
    </div>
</body>
</html>
