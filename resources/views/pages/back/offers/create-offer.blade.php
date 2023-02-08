<x-back-layout>
    <div class="bg-gray-100 min-h-screen pt-12">
        <form method="POST" action="{{ route('admin-offers-store') }}" class="w-1/3 mx-auto" enctype="multipart/form-data">
            @csrf

            <x-input-label for="title" :value="__('Pavadinimas')" />
            <x-text-input id="title" class="block mt-1 mb-3 w-full" type="text" name="title" :value="old('title')"
                autofocus />

            <x-input-label for="country" :value="__('Šalis')" />
            <x-select-input id="country" class="block mt-1 w-full mb-3 text-gray-500" type="text" name="country_id"
                :value="old('country_id')" required autofocus>
                <option>-- Šalis nepasirinkta</option>
                @forelse ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                @empty
                @endforelse
            </x-select-input>

            <x-input-label for="hotel" :value="__('Viešbutis')" />
            <x-select-input id="hotel" class="block mt-1 w-full mb-3 text-gray-500" type="text" name="hotel_id"
                :value="old('hotel')" required autofocus>
                <option>-- Viešbutis nepasirinktas</option>
                @forelse ($hotels as $hotel)
                    <option value="{{ $hotel->id }}">{{ $hotel->title }}</option>
                @empty
                @endforelse
            </x-select-input>

            <x-input-label for="season" :value="__('Kelionės pradžia')" />
            <x-text-input id="season" class="block mt-1 w-full mb-3" type="date" name="" :value="old('season')"
                autofocus />

            <x-input-label for="season" :value="__('Kelionės pabaiga')" />
            <x-text-input id="season" class="block mt-1 mb-3 w-full" type="date" name="" :value="old('season')"
                autofocus />

            <x-input-label for="price" :value="__('Kaina')" />
            <x-text-input id="price" class="block mt-1 mb-5 w-full" type="text" name="price" :value="old('price')"
                autofocus />

            <x-primary-button>
                {{ __('Pridėti') }}
            </x-primary-button>
        </form>
    </div>
</x-back-layout>
