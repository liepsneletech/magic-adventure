<x-back-layout>
    <div class="bg-gray-100 min-h-screen pt-12">
        <form method="POST" action="{{ route('update-back-hotel', $hotel) }}" class="w-1/3 mx-auto"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <x-input-label for="country" :value="__('Šalis')" />
            <x-select-input id="country" class="block mt-1 w-full mb-3 text-gray-500" type="text" name="country_id"
                value="{{ $country->country_name }}" autofocus>
                <option>-- Šalis nepasirinkta</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}" @if ($country->id === $hotel->country_id) selected @endif>
                        {{ $country->country_name }}</option>
                @endforeach
            </x-select-input>

            <x-input-label for="title" :value="__('Viešbučio pavadinimas')" />
            <x-text-input id="title" class="block mt-1 w-full  mb-3" type="text" name="title"
                value="{{ $hotel->title }}" autofocus />

            <x-input-label for="desc" :value="__('Aprašymas')" />
            <x-textarea-input id="desc" class="block mt-1 w-full  mb-3" name="desc" value="{{ $hotel->desc }}"
                autofocus />

            <div class="flex gap-2 px-3 mb-5 items-center bg-green-600 rounded-md">
                <span class="material-symbols-outlined text-white cursor-pointer">add_photo_alternate</span>
                <x-input-label for="image" :value="__('Pridėti nuotrauką')" class="py-2 text-white cursor-pointer" />
                <input id="image" type="file" name="image" class="hidden mb-2" />
            </div>

            <x-primary-button>
                {{ __('Atnaujinti') }}
            </x-primary-button>
        </form>
    </div>
</x-back-layout>
