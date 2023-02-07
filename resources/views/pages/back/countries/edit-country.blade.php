<x-back-layout>
    <div class="bg-gray-100 min-h-screen pt-28">
        <div class="container">
            <form method="POST" action="{{ route('admin-countries-update', $country) }}" class="w-1/3 mx-auto">
                @csrf
                @method('PUT')

                <x-input-label for="country" :value="__('Šalies pavadinimas')" />
                <x-text-input id="country" class="block mt-1 w-full mb-2" type="text" name="country_name"
                    value="{{ $country->country_name }}" autofocus />

                <x-input-label for="season_start" :value="__('Sezono pradžia')" />
                <x-text-input id="season_start" class="block mt-1 w-full mb-2" type="date" name="season_start"
                    value="{{ $country->season_start }}" autofocus />

                <x-input-label for="season_end" :value="__('Sezono pabaiga')" />
                <x-text-input id="season_end" class="block mt-1 w-full" type="date" name="season_end"
                    value="{{ $country->season_end }}" autofocus />

                <x-primary-button class="mt-5">
                    {{ __('Atnaujinti') }}
                </x-primary-button>
            </form>
        </div>
    </div>
</x-back-layout>
