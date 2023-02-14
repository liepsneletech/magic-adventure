<x-front-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="bg-gray-100 min-h-screen pt-32">
        <form method="POST" action="{{ route('login') }}" class="w-1/3 mx-auto">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('El. paštas')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Slaptažodis')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                    autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Prisiminti duomenis') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Pamiršote savo slaptažodį?') }}
                    </a>
                @endif

                <x-primary-button class="ml-3">
                    {{ __('Prisijungti') }}
                </x-primary-button>
            </div>
        </form>
    </div>
    </x-auth-layout>
