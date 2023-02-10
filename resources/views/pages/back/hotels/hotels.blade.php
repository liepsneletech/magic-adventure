<x-back-layout>
    <div class=" bg-gray-100 min-h-screen py-12">
        <div class="container">
            <div class="grid grid-cols-1 items-center mb-7">
                <h1
                    class="text-green-500 text-4xl font-['Bebas_Neue'] justify-self-center col-start-1 col-end-2 row-start-1 row-end-2">
                    Viešbučiai
                </h1>
                <a href="{{ route('admin-hotels-create') }}"
                    class="bg-pink-700 hover:bg-pink-800 py-2 px-3  text-white rounded-md text-right inline-block uppercase text-xs font-semibold tracking-widest justify-self-end col-start-1 col-end-2 row-start-1 row-end-2">
                    {{ __('+ Pridėti') }}
                </a>
            </div>
            <div class="rounded-lg grid grid-cols-2 gap-8">
                @forelse ($hotels as $hotel)
                    <div class="bg-white rounded-lg p-8 items-center justify-between gap-5 drop-shadow-sm">
                        <h2 class="text-green-500 mb-3 text-2xl font-['Bebas_Neue']">{{ $hotel->title }}</h2>
                        <div class="flex
                            gap-5 mb-5 items-start">
                            <img src="{{ asset($hotel->image) }}" class="w-1/2 h-auto" />
                            <div>
                                <p class="mb-3 font-bold text-gray-700 text-lg font-['Roboto']">
                                    {{ $hotel->hotelCountry->country_name }}
                                </p>
                                <p class="text-sm text-gray-600">{{ substr($hotel->desc, 0, 230) . '...' }}</p>
                            </div>
                        </div>

                        <div class="flex gap-3">
                            <a href="{{ route('admin-hotels-edit', $hotel) }}">
                                <x-primary-button class="bg-green-500 hover:bg-green-400">
                                    {{ __('Redaguoti') }}
                                </x-primary-button>
                            </a>
                            <form action="{{ route('admin-hotels-delete', $hotel) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <x-primary-button>
                                    {{ __('Ištrinti') }}
                                </x-primary-button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-center">Nepridėtas nė vienas viešbutis.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-back-layout>
