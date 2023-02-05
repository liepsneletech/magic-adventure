<x-back-layout>
    <div class=" bg-gray-100 min-h-screen pt-28">
        <div class="container flex flex-col gap-5">
            @forelse ($hotels as $hotel)
                <div class="grid grid-cols-6 items-center justify-between gap-5 mx-auto max-w-fit">
                    <p>{{ $hotel->hotelCountry->country_name }}</p>
                    <p>{{ $hotel->title }}</p>
                    <p>{{ $hotel->desc }}</p>
                    <p>{{ $hotel->price }}</p>
                    <img src="{{ asset($hotel->image) }}" />

                    <div class="flex gap-3">
                        <x-primary-button>
                            {{ __('Edit') }}
                        </x-primary-button>
                        <x-primary-button>
                            {{ __('Delete') }}
                        </x-primary-button>
                    </div>
                </div>
            @empty
                <p>Nepridėtas nė vienas viešbutis.</p>
            @endforelse
        </div>
    </div>
</x-back-layout>
