<x-front-layout>
    <div class="bg-gray-100 min-h-screen py-12">
        <div class="container">
            <h1
                class="text-center text-green-500 mb-8 text-4xl font-['Bebas_Neue'] justify-self-center col-start-1 col-end-2 row-start-1 row-end-2">
                Pasiūlymai
            </h1>

            <div class="flex mb-8 justify-between border px-7 py-4 rounded-[35px] border-pink-400">
                <form action="{{ route('offers') }}">
                    <label for="country_id" class="filters-label font-semibold">Šalis:</label>
                    <select name="country_id" id="country_id" class="focus:ring-0 focus:ring-offset-0 filter-select mr-3">
                        <option selected disabled value="Pasirinkite šalį">Pasirinkite šalį</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}" @if ($country->id == $countryShow) selected @endif>
                                {{ $country->country_name }}</option>
                        @endforeach
                    </select>

                    <label for="sort" class="filters-label font-semibold">Rikiuoti:</label>
                    <select name="sort" id="sort" class="focus:ring-0 focus:ring-offset-0 filter-select">
                        <option selected disabled>Numatytasis rikiavimas</option>
                        @foreach ($sortSelect as $value => $price)
                            <option value="{{ $value }}" @if ($sortShow == $value) selected @endif>
                                {{ $price }}</option>
                        @endforeach
                    </select>

                    <button class="text-white bg-pink-600 hover:bg-pink-700 py-[10.5px] px-[30px] ml-3 rounded-[20px]"
                        type="submit"><i class="fa-solid fa-arrow-right"></i></button>
                    <a href="{{ route('offers') }}"
                        class="text-white bg-gray-400 hover:bg-pink-700 py-[10.5px] px-[30px] ml-2 rounded-[20px]"><i
                            class="fa-solid fa-arrows-rotate"></i></a>
                </form>
                <form class="search-form" action="{{ route('offers') }}">
                    <input type="text" placeholder="Ieškoti..."
                        class="search-input rounded-[20px] border-none focus:ring-0 focus:ring-offset-0" name="s"
                        value="@if (isset($offers) && count($offers) === 0) {{ $searchTerm }} @endif">
                    <button class=" text-white bg-gray-400 hover:bg-pink-700 py-[10.5px] px-[30px] rounded-r-[20px]"><i
                            class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>


            <div class="flex flex-nowrap gap-16">
                @include('components.cats')
                <div class="rounded-lg grid grid-cols-2 gap-8">
                    @forelse ($offers as $offer)
                        <div
                            class="bg-white bg-no-repeat rounded-lg p-5 items-center justify-between gap-5 drop-shadow-sm">
                            <img src="{{ $offer->hotel->image }}" alt="Hotel image" class="mb-5">
                            <h2 class="text-green-500 mb-3 text-2xl font-['Bebas_Neue']">{{ $offer->title }}</h2>
                            <div class="grid grid-cols-1 gap-5 items-start">
                                <div>
                                    <p class="mb-3 font-bold text-gray-700 text-lg font-['Roboto']">
                                        {{ $offer->hotel->title }}</p>
                                    <p class="text-gray-800">Šalis: {{ $offer->country->country_name }}</p>
                                    <p class="underline text-gray-700">{{ $offer->travel_start }} -
                                        {{ $offer->travel_end }}</p>
                                    <p class="text-gray-800 mb-4">Trukmė: {{ $offer->duration }} d.</p>
                                </div>
                                <div class="flex align-end justify-between">
                                    <p class="text-green-500 text-3xl font-['Bebas_Neue'] self-end">
                                        {{ $offer->price }}
                                        &euro;
                                    </p>
                                    @auth
                                        <form action="{{ route('add-to-cart') }}" method="post" class="flex justify-end">
                                            @csrf
                                            <input type="number" min="1" name="count" value="1"
                                                class="mb-3 rounded-full bg-gray-200 border-0 focus:ring-0 focus:ring-offset-0">
                                            <input type="hidden" name="product" value="{{ $offer->id }}">
                                            <a href="{{ route('register') }}"
                                                class="bg-pink-700 py-3 px-4  text-white rounded-full flex gap-1 uppercase text-sm font-semibold tracking-widest hover:bg-pink-800">
                                                {{ __('Į krepšelį') }}
                                            </a>
                                        </form>
                                    @endauth
                                    @guest
                                        <a href="{{ route('register') }}"
                                            class="bg-pink-700 py-3 px-4 text-white rounded-full flex gap-1 uppercase text-sm font-semibold tracking-widest hover:bg-pink-800">
                                            {{ __('Registruotis') }}
                                        </a>
                                    @endguest
                                </div>
                            </div>

                        </div>
                    @empty
                        <p>Nepridėtas nė vienas pasiūlymas.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</x-front-layout>
