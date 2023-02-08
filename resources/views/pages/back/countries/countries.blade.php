<x-back-layout>
    <div class="bg-gray-100 min-h-screen pt-12">
        <div class="flex justify-between items-center container">
            <h1 class="text-center text-green-500 mb-5 text-4xl font-['Bebas_Neue']">Šalių
                sąrašas
            </h1>
            <a href="{{ route('admin-countries-create', $country) }}"
                class="bg-pink-700 hover:bg-pink-800 py-2 px-3 text-white rounded-md text-right mb-3 inline-block uppercase text-xs font-semibold tracking-widest">
                {{ __('+ Pridėti') }}
            </a>
        </div>

        <div class="container flex flex-col gap-5 bg-white rounded-lg p-16 drop-shadow-sm">

            @forelse ($countries as $country)
                <div
                    class="grid grid-cols-4 items-center justify-between gap-5 mx-auto max-w-fit border-l-8 border-green-500 bg-gray-100 px-6 py-3 rounded-lg">
                    <p class="font-bold">{{ $country->country_name }}</p>
                    <p>{{ $country->season_start }}</p>
                    <p>{{ $country->season_end }}</p>

                    <div class="flex gap-3">
                        <a href="{{ route('admin-countries-edit', $country) }}">
                            <x-primary-button class="bg-green-500 hover:bg-green-400">
                                {{ __('Redaguoti') }}
                            </x-primary-button>
                        </a>
                        <form action="{{ route('admin-countries-delete', $country) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <x-primary-button>
                                {{ __('Ištrinti') }}
                            </x-primary-button>
                        </form>
                    </div>
                </div>
            @empty
                <p>Nepridėta nė viena šalis.</p>
            @endforelse
        </div>
    </div>
</x-back-layout>
