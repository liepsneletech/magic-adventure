<x-front-layout>
    <div class="bg-gray-100 min-h-screen py-12">
        <div class="container">
            <h1
                class="text-center text-green-500 mb-8 text-4xl font-['Bebas_Neue'] justify-self-center col-start-1 col-end-2 row-start-1 row-end-2">
                Pasiūlymai
            </h1>


            <form>
                <div class="flex mb-8">
                    <div>
                        <label for="sort" class="filters-label">Rikiuoti:</label>
                        <select name="sort" id="sort" class="filter-select">

                            @foreach ($sortSelect as $value => $name)
                                <option value="{{ $value }}" @if ($sortShow == $value) selected @endif>
                                    {{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn-main text-white search-btn filter-btn" type="submit"><i
                            class="fa-solid fa-arrow-right"></i></button>
                    <a href="{{ route('offers') }}" class="btn-main text-white search-btn filter-btn reset-btn"><i
                            class="fa-solid fa-arrows-rotate"></i></a>
                </div>
                <div class="rounded-lg grid grid-cols-2 gap-8">
                    @forelse ($offers as $offer)
                        <div
                            class="bg-white bg-no-repeat rounded-lg p-8 items-center justify-between gap-5 drop-shadow-sm">

                            <img src="{{ $offer->hotel->image }}" alt="Hotel image" class="mb-5">
                            <h2 class="text-green-500 mb-3 text-2xl font-['Bebas_Neue']">{{ $offer->title }}</h2>
                            <div class="flex gap-5 items-start">
                                <div>
                                    <p class="mb-3 font-bold text-gray-700 text-lg font-['Roboto']">
                                        {{ $offer->hotel->title }}</p>
                                    <p class="text-gray-800">Šalis: {{ $offer->country->country_name }}</p>
                                    <p class="underline text-gray-700">{{ $offer->travel_start }} -
                                        {{ $offer->travel_end }}</p>
                                    <p class="text-gray-800 mb-4">Trukmė: {{ $offer->duration }}</p>
                                    <p class="text-green-500 text-2xl font-['Bebas_Neue']">{{ $offer->price }} &euro;
                                    </p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>Nepridėtas nė vienas pasiūlymas.</p>
                    @endforelse
                </div>
            </form>
        </div>
    </div>
</x-front-layout>
