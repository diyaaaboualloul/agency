<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Agency</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">

    <!-- Navbar -->
    <nav class="bg-white dark:bg-gray-800 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Left -->
                <div class="flex items-center">
                    <a href="{{ url('/') }}" class="text-xl font-bold">My Agency</a>
                </div>

                <!-- Right -->
                <div class="flex items-center space-x-4">
                    @guest
                        <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium text-blue-600">Login</a>
                        <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-medium text-green-600">Register</a>
                    @endguest

                    @auth
                        <span class="text-sm">Hello, {{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-red-600 text-white text-sm rounded">
                                Logout
                            </button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="max-w-7xl mx-auto py-10 px-6">
        <h1 class="text-3xl font-bold mb-4">Welcome to the Agency Website</h1>
        <p class="text-lg">
            This homepage is visible to <strong>everyone</strong>, whether logged in or not.
        </p>

        @auth
            <div class="mt-6">
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('editor'))
                    <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-blue-600 text-white rounded">
                        Go to Dashboard
                    </a>
                @else
                    <a href="{{ url('/user/home') }}" class="px-4 py-2 bg-gray-600 text-white rounded">
                        Go to Your Page
                    </a>
                @endif
            </div>
        @endauth
    </div>

</body>
</html>
