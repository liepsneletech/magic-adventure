<x-back-layout>
    <div class="bg-gray-100 min-h-screen py-12">
        <div class="container">
            <div class="grid grid-cols-1 items-center mb-8 ">
                <h1
                    class="text-center text-green-500 text-4xl font-['Bebas_Neue'] justify-self-center col-start-1 col-end-2 row-start-1 row-end-2">
                    Pasiūlymai
                </h1>
                <a href="{{ route('admin-offers-create') }}"
                    class="bg-pink-700 hover:bg-pink-800 py-2 px-3 text-white rounded-md text-right inline-block uppercase text-xs font-semibold tracking-widest justify-self-end col-start-1 col-end-2 row-start-1 row-end-2">
                    {{ __('+ Pridėti') }}
                </a>
            </div>

            <div class="rounded-lg grid grid-cols-2 gap-8">
                @forelse ($offers as $offer)
                    <div class="bg-white rounded-lg p-8 items-center justify-between gap-5 drop-shadow-sm">
                        <h2 class="text-green-500 mb-3 text-2xl font-['Bebas_Neue']">{{ $offer->title }}</h2>
                        <div class="flex gap-5 mb-5 items-start">
                            <img src="{{ asset($offer->hotel->image) }}" class="w-1/2" />
                            <div>
                                <p class="mb-3 font-bold text-gray-700 text-lg font-['Roboto']">
                                    {{ $offer->hotel->title }}</p>
                                <p class="text-gray-800">Šalis: {{ $offer->country->country_name }}</p>
                                <p class="underline text-gray-700">{{ $offer->travel_start }} -
                                    {{ $offer->travel_end }}</p>
                                <p class="text-gray-800 mb-6">Trukmė: {{ $offer->duration }}</p>

                                <p class="text-green-500 mb-3 text-2xl font-['Bebas_Neue']">{{ $offer->price }} &euro;
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-3">
                            <a href="{{ route('admin-offers-edit', $offer) }}">
                                <x-primary-button class="bg-green-500 hover:bg-green-400">
                                    {{ __('Redaguoti') }}
                                </x-primary-button>
                            </a>
                            <form action="{{ route('admin-offers-delete', $offer) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <x-primary-button>
                                    {{ __('Ištrinti') }}
                                </x-primary-button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p>Nepridėtas nė vienas pasiūlymas.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-back-layout>
