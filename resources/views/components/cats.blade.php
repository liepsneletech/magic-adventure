@inject('cats', 'App\Services\CatsService')

<h2>Šalys</h2>
<div>
    @forelse($cats->get() as $country)
        <a href="{{ route('show-cats-offers', $country) }}">
            <h3>
                {{ $country->country_name }}
                <div>[{{ $country->offers()->count() }}]</div>
            </h3>
            {{-- </a> --}}
        @empty
            <p>Nėra sukurtų kategorijų</p>
    @endforelse
</div>
