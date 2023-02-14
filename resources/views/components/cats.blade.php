@inject('cats', 'App\Services\CatsService')
<div>
    <h3 class="text-green-500 mb-4 text-2xl font-['Bebas_Neue']">Šalys</h3>
    <div class="flex flex-col gap-2 mr-5">
        @forelse($cats->get() as $country)
            <a href="{{ route('show-cats-offers', $country) }}">
                <h3 class="text-lg text-pink-600 hover:text-green-500 font-bold flex gap-1">
                    {{ $country->country_name }}
                    <span>({{ $country->offers()->count() }})</span>
                </h3>
            </a>
        @empty
            <p>Nėra sukurtų kategorijų</p>
        @endforelse
    </div>
</div>
