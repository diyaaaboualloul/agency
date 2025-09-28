<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f9f9f9; color: #333; }
        .container { max-width: 600px; margin: 20px auto; background: #fff; padding: 20px; border-radius: 8px; }
        h2 { color: #2C63F4; }
        p { line-height: 1.6; }
        .footer { margin-top: 20px; font-size: 12px; color: #777; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Thank you, {{ $name }}! 🎉</h2>
        <p>We received your message:</p>
        <blockquote>"{{ $message }}"</blockquote>
        <p>Our team will get back to you as soon as possible.</p>
        <div class="footer">📩 AtoZ Agency</div>
    </div>
</body>
</html>
