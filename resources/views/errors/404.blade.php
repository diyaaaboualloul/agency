<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #6EE7B7, #3B82F6, #9333EA);
            color: #fff;
            overflow: hidden;
        }

        .container {
            text-align: center;
            animation: fadeIn 1.2s ease-in-out;
        }

        h1 {
            font-size: 120px;
            font-weight: 800;
            margin: 0;
            background: linear-gradient(90deg, #ff6a00, #ee0979);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: float 3s ease-in-out infinite;
        }

        h2 {
            font-size: 28px;
            margin: 15px 0;
        }

        p {
            font-size: 18px;
            margin-bottom: 30px;
            color: #f0f0f0;
        }

        a.btn {
            text-decoration: none;
            padding: 12px 30px;
            background: #fff;
            color: #3B82F6;
            font-weight: 600;
            border-radius: 30px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
        }

        a.btn:hover {
            background: #3B82F6;
            color: #fff;
            transform: scale(1.05);
            box-shadow: 0 12px 25px rgba(0,0,0,0.3);
        }

        /* Animations */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>404</h1>
        <h2>Oops! Page Not Found</h2>
        <p>The page you are looking for doesn’t exist or has been moved.</p>
        <a href="{{ url('/') }}" class="btn">Go Back Home</a>
    </div>
</body>
</html>
