<x-guest-layout>
    <div class="max-w-md mx-auto mt-10 bg-white/80 dark:bg-gray-800/80 backdrop-blur-md 
                rounded-lg shadow-xl p-8 border border-gray-200 dark:border-gray-700">

        <!-- Title -->
        <h2 class="text-2xl font-bold text-center text-gray-900 dark:text-gray-100 mb-4">
            🔒 Forgot Password?
        </h2>
        <p class="text-sm text-gray-600 dark:text-gray-400 text-center mb-6">
            No problem! Enter your email below and we’ll send you a link to reset your password.
        </p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" 
                              type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between">
                <!-- Back to Login -->
                <a href="{{ route('login') }}" 
                   class="text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition">
                    ← Back to Login
                </a>

                <!-- Reset Link Button -->
                <x-primary-button class="px-6 py-2 bg-primary hover:bg-blue-700 transition rounded-lg">
                    {{ __('Send Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
