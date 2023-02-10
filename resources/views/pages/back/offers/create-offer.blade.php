<x-back-layout>
    <div class="bg-gray-100 min-h-screen pt-12">

        @if (session()->has('success'))
            <p>{{ Session::get('success') }}</p>
        @endif

        <form method="POST" action="{{ route('admin-offers-store') }}" class="w-1/3 mx-auto" enctype="multipart/form-data">
            @csrf

            <x-input-label for="title" :value="__('Pavadinimas')" />
            <x-text-input id="title" class="block mt-1 mb-3 w-full" type="text" name="title" :value="old('title')"
                autofocus />

            @error('title')
                <p class="text-white bg-red-600 rounded-lg py-1 px-4 text-sm mb-5">{{ $message }}</p>
            @enderror

            <x-input-label for="country" :value="__('Šalis')" />
            <x-select-input id="country" class="block mt-1 w-full mb-3 text-gray-500" type="text" name="country_id"
                :value="old('country_id')" required autofocus>
                <option selected disabled>-- Šalis nepasirinkta</option>
                @forelse ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                @empty
                @endforelse
            </x-select-input>

            @error('country_id')
                <p class="text-white bg-red-600 rounded-lg py-1 px-4 text-sm mb-5">{{ $message }}</p>
            @enderror

            <x-input-label for="hotel" :value="__('Viešbutis')" />
            <x-select-input id="hotel" class="block mt-1 w-full mb-3 text-gray-500" type="text" name="hotel_id"
                :value="old('hotel')" required autofocus>
                <option selected disabled>-- Viešbutis nepasirinktas</option>
                @forelse ($hotels as $hotel)
                    <option value="{{ $hotel->id }}">{{ $hotel->title }}</option>
                @empty
                @endforelse
            </x-select-input>

            @error('hotel_id')
                <p class="text-white bg-red-600 rounded-lg py-1 px-4 text-sm mb-5">{{ $message }}</p>
            @enderror

            <x-input-label for="travel_start" :value="__('Kelionės pradžia')" />
            <x-text-input id="travel_start" class="block mt-1 w-full mb-3" type="date" name="travel_start"
                :value="old('travel_start')" autofocus />

            @error('travel_start')
                <p class="text-white bg-red-600 rounded-lg py-1 px-4 text-sm mb-5">{{ $message }}</p>
            @enderror

            <x-input-label for="travel_end" :value="__('Kelionės pabaiga')" />
            <x-text-input id="travel_end" class="block mt-1 mb-3 w-full" type="date" name="travel_end"
                :value="old('travel_end')" autofocus />

            @error('travel_end')
                <p class="text-white bg-red-600 rounded-lg py-1 px-4 text-sm mb-5">{{ $message }}</p>
            @enderror

            <x-input-label for="price" :value="__('Kaina')" />
            <x-text-input id="price" class="block mt-1 mb-3 w-full" type="text" name="price" :value="old('price')"
                autofocus />

            @error('price')
                <p class="text-white bg-red-600 rounded-lg py-1 px-4 text-sm mb-5">{{ $message }}</p>
            @enderror

            <x-primary-button class="mt-2">
                {{ __('Pridėti') }}
            </x-primary-button>
        </form>

    </div>
    <p class="result"></p>
</x-back-layout>
