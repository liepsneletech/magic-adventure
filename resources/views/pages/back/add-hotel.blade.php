<x-back-layout>
    <div class="container">
        <form method="POST" action="{{ route('store-back-hotel') }}" class="w-1/3 mx-auto">
            @csrf

            <x-input-label for="country" :value="__('Šalis')" />
            <x-text-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')" required
                autofocus />
            <x-input-label for="season" :value="__('Viešbučio pavadinimas')" />
            <x-text-input id="season" class="block mt-1 w-full" type="text" name="season" :value="old('season')"
                required autofocus />
            <x-input-label for="season" :value="__('Kaina')" />
            <x-text-input id="season" class="block mt-1 w-full" type="text" name="season" :value="old('season')"
                required autofocus />
            <x-input-label for="season" :value="__('Nuotrauka')" />
            <x-text-input id="season" class="block mt-1 w-full" type="text" name="season" :value="old('season')"
                required autofocus />
            <x-input-label for="season" :value="__('Kelionės trukmė')" />
            <x-text-input id="season" class="block mt-1 w-full" type="text" name="season" :value="old('season')"
                required autofocus />

            <x-primary-button class="ml-3">
                {{ __('Pridėti') }}
            </x-primary-button>
        </form>
    </div>
</x-back-layout>
