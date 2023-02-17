<x-front-layout>
    <div class="bg-gray-100 min-h-screen pt-12 pb-20">
        <div class="container">
            <h1
                class="text-center text-green-500 mb-8 text-4xl font-['Bebas_Neue'] justify-self-center col-start-1 col-end-2 row-start-1 row-end-2">
                Mano užsakymai
            </h1>
            <div class="grid gap-6">
                @forelse ($orders as $order)
                    {{-- single order --}}
                    <article class="order w-full mx-auto border-l-8 border-green-500 bg-white  rounded-lg shadow-sm">
                        {{-- order head --}}
                        <div class="grid grid-cols-[repeat(7,auto)] items-center justify-between px-6 py-4">
                            <p class="text-gray-700"><b>Užsakymo ID:</b> <span>{{ $order->id }}</span></p>
                            <p class="text-gray-700"><b>Data:</b> <span>{{ $order->created_at->format('Y-m-d') }}</span>
                            </p>
                            <p class="text-gray-700"><b>Vardas:</b> <span>{{ $order->order_json->name }}</span></p>
                            <p class="text-gray-700"><b>Pavardė:</b> <span>{{ $order->order_json->surname }}</span></p>
                            <p class="text-gray-700"><b>Iš viso:</b> <span>{{ $order->order_json->total }} &euro;</span>
                            </p>
                            <p
                                class="@if ($order->status == 0) order-not-approved @elseif($order->status == 1) order-approved @else order-canceled @endif">
                                @if ($order->status == 0)
                                    {{ 'Nepatvirtintas' }}
                                @elseif ($order->status == 1)
                                    {{ 'Patvirtintas' }}
                                @else
                                    {{ 'Atšauktas' }}
                                @endif
                            </p>
                            {{-- accordion arrows --}}
                            <button class="order-btn">
                                <span class="plus-icon text-2xl text-green-500"><i
                                        class="fa-regular fa-square-plus"></i></span>
                                <span class="minus-icon text-2xl text-green-500"><i
                                        class="fa-regular fa-square-minus"></i></span>
                            </button>
                        </div>
                        {{-- order body --}}
                        <div class="order-body grid grid-cols-3 bg-green-500 text-white rounded-br-lg">
                            @foreach ($order->order_json->offers as $offer)
                                {{-- single offer --}}
                                <div class="single-offer px-6 py-6">
                                    <h3>Pasiūlymas: {{ $offer->title }} x {{ $offer->count }}</h3>
                                    <p>Viešbutis: {{ $offer->hotel_title }}</p>
                                    <p>Šalis: {{ $offer->country_name }}</p>
                                    <p>Pasiūlymo kaina: {{ $offer->price }} &euro;</p>
                                </div>
                            @endforeach
                        </div>
                    </article>
                @empty
                    <p>Užsakymų nėra</p>
                @endforelse
            </div>
        </div>
    </div>
</x-front-layout>
