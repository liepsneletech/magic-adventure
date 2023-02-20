<x-back-layout>
    <div class="bg-gray-100 min-h-screen pt-12">
        <h1 class="text-center text-green-500 mb-8 text-4xl font-['Bebas_Neue']">Redaguoti pasiūlymą
        </h1>

        <div class="container bg-white rounded-lg p-16 drop-shadow-md">
            <form method="POST" action="{{ route('admin-offers-update', $offer) }}" class="w-1/3 mx-auto"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <x-input-label for="title" :value="__('Pavadinimas')" />
                <x-text-input id="title" class="block mt-1 mb-3 w-full bg-gray-100" type="text" name="title"
                    :value="$offer->title" autofocus />

                <x-input-label for="country_id" :value="__('Šalis')" />
                <x-select-input id="country_id" class="block mt-1 w-full mb-3 text-gray-500" type="text"
                    name="country_id" :value="old('country_id')">
                    <option selected disabled>-- Šalis nepasirinkta</option>
                    @forelse ($countries as $country)
                        <option value="{{ $country->id }}">
                            {{ $country->country_name }}
                        </option>
                    @endforeach
                </x-select-input>

                @error('country_id')
                    <p class="text-white bg-red-600 rounded-lg py-1 px-4 text-sm mb-5">{{ $message }}</p>
                @enderror

                <x-input-label for="hotel_id" :value="__('Viešbutis')" />
                <x-select-input id="hotel_id" class="block mt-1 w-full mb-3 text-gray-500" type="text"
                    name="hotel_id" :value="old('hotel_id')">
                </x-select-input>

                @error('hotel_id')
                    <p class="text-white bg-red-600 rounded-lg py-1 px-4 text-sm mb-5">{{ $message }}</p>
                @enderror

                <x-input-label for="travel_start" :value="__('Kelionės pradžia')" />
                <x-text-input id="travel_start" class="block mt-1 w-full mb-3 bg-gray-100" type="date"
                    name="travel_start" :value="$offer->travel_start" />

                <x-input-label for="travel_end" :value="__('Kelionės pabaiga')" />
                <x-text-input id="travel_end" class="block mt-1 mb-3 w-full bg-gray-100" type="date"
                    name="travel_end" :value="$offer->travel_end" />

                <x-input-label for="price" :value="__('Kaina')" />
                <x-text-input id="price" class="block mt-1 mb-5 w-full bg-gray-100" type="text" name="price"
                    :value="$offer->price" />

                <x-primary-button>
                    {{ __('Atnaujinti') }}
                </x-primary-button>
            </form>
        </div>
    </div>
</x-back-layout>
