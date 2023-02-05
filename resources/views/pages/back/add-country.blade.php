<x-back-layout>
    <div class="container">
        <form method="POST" action="{{ route('store-back-country') }}" class="w-1/3 mx-auto">
            @csrf

            <x-input-label for="country" :value="__('Šalies pavadinimas')" />
            <x-text-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')" required
                autofocus />

            <x-input-label for="season" :value="__('Sezono pradžia')" />
            <x-text-input id="season" class="block mt-1 w-full" type="date" name="season" :value="old('season')"
                required autofocus />

            <x-input-label for="season" :value="__('Sezono pabaiga')" />
            <x-text-input id="season" class="block mt-1 w-full" type="date" name="season" :value="old('season')"
                required autofocus />

            <x-primary-button class="mt-3">
                {{ __('Pridėti') }}
            </x-primary-button>
        </form>
    </div>
</x-back-layout>
