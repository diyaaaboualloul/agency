<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS (for dropdown + toggler) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

        <!-- Scripts -->

        <style>
            body {
                background: url('{{ asset("assets/images/contact/hso-glass-skyscrapers-reflecting-clouds.webp") }}') center center / cover no-repeat fixed;
                min-height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .auth-card {
                background: rgba(255, 255, 255, 0.9); /* white overlay for readability */
                backdrop-filter: blur(6px);
                border-radius: 12px;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            }
        </style>
    </head>
    <body>
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div>
                <!-- <a href="/" class="d-flex justify-content-center mb-4">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a> -->
                <div class="auth-card p-4">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
