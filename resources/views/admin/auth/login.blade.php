{{-- ✅ Menggunakan layout guest.blade.php sebagai komponen --}}
<x-layouts.guest>

    {{-- Header Form --}}
    <div class="text-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Admin Panel</h1>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Please log in to continue.</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf

        <div class="space-y-6">
            <div>
                <x-input-label for="email" :value="__('Email')" class="dark:text-gray-300" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password" :value="__('Password')" class="dark:text-gray-300" />
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
        </div>

        <div class="mt-8">
            <x-primary-button class="w-full justify-center py-3 text-base">
                {{ __('Log In') }}
            </x-primary-button>
        </div>
    </form>
    
</x-layouts.guest>