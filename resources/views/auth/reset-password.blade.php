<x-guest-layout>
    <div class="max-w-md mx-auto mt-10 bg-white/80 dark:bg-gray-800/80 backdrop-blur-md 
                rounded-lg shadow-xl p-8 border border-gray-200 dark:border-gray-700">
        <h2 class="text-2xl font-bold text-center text-gray-900 dark:text-gray-100 mb-6">
            🔑 Reset Your Password
        </h2>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" 
                    :value="old('email', $request->email)" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('New Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" 
                    name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm New Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" 
                    name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between mt-6">
                <!-- Back to Login Button -->
                <a href="{{ route('login') }}" 
                   class="text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition">
                    ← Back to Login
                </a>

                <!-- Reset Password Button -->
                <x-primary-button class="px-6 py-2 bg-primary hover:bg-blue-700 transition rounded-lg">
                    {{ __('Reset Password') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
