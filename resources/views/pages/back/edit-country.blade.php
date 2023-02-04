<x-back-layout>
    <div class="container">
        <form method="POST" action="{{ route('store-back-country') }}" class="w-1/3 mx-auto pt-10">
            @csrf

            <x-input-label for="country" :value="__('Šalies pavadinimas')" />
            <x-text-input id="country" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus />
            <x-primary-button class="ml-3">
                {{ __('Pridėti') }}
            </x-primary-button>
        </form>
    </div>
</x-back-layout>
