<x-guest-layout>
    <div class="max-w-md mx-auto mt-10 bg-white/80 dark:bg-gray-800/80 backdrop-blur-md 
                rounded-lg shadow-xl p-8 border border-gray-200 dark:border-gray-700">

        <!-- Title -->
        <h2 class="text-2xl font-bold text-center text-gray-900 dark:text-gray-100 mb-4">
            🔑 Confirm Password
        </h2>
        <p class="text-sm text-gray-600 dark:text-gray-400 text-center mb-6">
            This is a secure area of the application.  
            Please confirm your password before continuing.
        </p>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Button -->
            <div class="flex justify-end">
                <x-primary-button class="px-6 py-2 bg-primary hover:bg-blue-700 transition rounded-lg">
                    {{ __('Confirm') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
