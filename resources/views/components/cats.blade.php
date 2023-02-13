@inject('cats', 'App\Services\CatsService')
<div>
    @forelse($cats->get() as $country)
        <a href="{{ route('show-cats-offers', $country) }}">
            <h3 class="text-lg text-pink-600 font-bold">
                {{ $country->country_name }}
                <span>({{ $country->offers()->count() }})</span>
            </h3>
        </a>
    @empty
        <p>Nėra sukurtų kategorijų</p>
    @endforelse
</div>
