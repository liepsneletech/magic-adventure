<x-back-layout>
    <div class="bg-gray-100 min-h-screen py-12">
        <h1 class="text-center text-green-500 mb-8 text-4xl font-['Bebas_Neue']">Redaguoti viešbutį
        </h1>
        <div class="container bg-white rounded-lg p-16 drop-shadow-md">

            <form method="POST" action="{{ route('admin-hotels-update', $hotel) }}"
                class="mx-auto flex gap-7 justify-center items-start" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="w-1/3">
                    <x-input-label for="country" :value="__('Šalis')" />
                    <x-select-input id="country" class="block mt-1 w-full mb-3 text-gray-600 bg-gray-100"
                        type="text" name="country_id" value="{{ $country->country_name }}" autofocus>
                        <option>-- Šalis nepasirinkta</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}" @if ($country->id === $hotel->country_id) selected @endif>
                                {{ $country->country_name }}</option>
                        @endforeach
                    </x-select-input>

                    <x-input-label for="title" :value="__('Viešbučio pavadinimas')" />
                    <x-text-input id="title" class="block mt-1 w-full mb-3 bg-gray-100" type="text"
                        name="title" value="{{ $hotel->title }}" autofocus />

                    <x-input-label for="desc" :value="__('Aprašymas')" />
                    <x-textarea-input id="desc" class="block mt-1 w-full mb-5 bg-gray-100" name="desc"
                        value="{{ $hotel->desc }}" rows="3" autofocus />

                    <x-primary-button>
                        {{ __('Atnaujinti') }}
                    </x-primary-button>
                </div>



                <div class="p-5 border border-green-400 rounded-lg mb-5 w-1/3">
                    <img src="{{ asset($hotel->image) }}" class="mb-5" />

                    <div class="flex gap-2 px-3 items-center bg-green-600 rounded-md">
                        <span class="material-symbols-outlined text-white cursor-pointer">add_photo_alternate</span>
                        <x-input-label for="image" :value="__('Pakeisti nuotrauką')" class="py-2 text-white cursor-pointer" />
                        <input id="image" type="file" name="image" class="hidden mb-2" />
                    </div>

                </div>


            </form>
        </div>
    </div>
</x-back-layout>
