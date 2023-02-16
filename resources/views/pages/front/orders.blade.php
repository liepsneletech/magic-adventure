<x-front-layout>
    <div class="bg-gray-100 min-h-screen pt-12">
        <div class="container">
            @foreach ($orders as $order)
                {{-- single order --}}
                <article class="order mt-10">
                    {{-- order head --}}
                    <div
                        class="grid grid-cols-[repeat(7,auto)] items-center justify-between mx-auto border-l-8 border-green-500 bg-white px-6 py-4 rounded-lg shadow-sm">
                        <p>Užsakymo ID: <span>{{ $order->id }}</span></p>
                        <p>Data: <span>{{ $order->created_at->format('Y-m-d') }}</span></p>
                        <p>Vardas: <span>{{ $order->order_json->name }}</span></p>
                        <p>Pavardė: <span>{{ $order->order_json->surname }}</span></p>
                        <p>Iš viso: <span>{{ $order->order_json->total }} &euro;</span></p>
                        <p>
                            @if ($order->status == 0)
                                {{ 'Nepatvirtintas' }}
                            @elseif ($order->status == 1)
                                {{ 'Patvirtintas' }}
                            @else
                                {{ 'Atšauktas' }}
                            @endif
                        </p>
                        {{-- accordion arrows --}}
                        <button>
                            <span class="text-2xl text-green-500"><i class="fa-regular fa-square-plus"></i></span>
                            <span class="text-2xl text-green-500"><i class="fa-regular fa-square-minus"></i></span>
                        </button>
                    </div>
                    {{-- order body --}}
                    <div class="order-body grid grid-cols-3">
                        @foreach ($order->order_json->offers as $offer)
                            {{-- single offer --}}
                            <div class="single-offer">
                                <h3>Pasiūlymas: {{ $offer->title }} x {{ $offer->count }}</h3>
                                <p>Viešbutis: {{ $offer->hotel_title }}</p>
                                <p>Šalis: {{ $offer->country_name }}</p>
                                <p>Pasiūlymo kaina:{{ $offer->price }}</p>
                            </div>
                        @endforeach
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</x-front-layout>
