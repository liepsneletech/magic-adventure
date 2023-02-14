@inject('cart', 'App\Services\CartService')
<x-front-layout>
    <div class="bg-gray-100 min-h-screen py-12">
        <div class="container">
            <h1
                class="text-center text-pink-600 mb-8 text-4xl font-['Bebas_Neue'] justify-self-center col-start-1 col-end-2 row-start-1 row-end-2">
                Jūsų krepšelis
            </h1>
            <form method="POST" action="{{ route('make-order') }}" class="">
                @csrf

                <div class="flex flex-col px-8 py-7 bg-green-500 text-white rounded-lg w-2/3 mx-auto">
                    @forelse($cart->list as $product)
                        <div
                            class="flex
                        flex-nowrap justify-between border-b border-white border-opacity-30 py-2">
                            <div>
                                {{ $product->title }}
                                <b>x {{ $product->count }}</b>
                            </div>
                            <p>{{ $product->sum }} &euro;</p>
                        </div>
                    @empty
                        <span class="dropdown-item">Krepšelis tuščias</span>
                    @endforelse
                    <div class="flex justify-between items-center pt-10">
                        <p>VISO:</p>
                        <p>{{ $cart->total }} &euro;</p>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 mt-16 w-2/3 mx-auto">
                    <a href="{{ route('offers') }}"
                        class="border-green-500 border-2 py-2 px-3 text-green-500 rounded-full uppercase text-sm font-bold tracking-widest hover:bg-green-500 hover:text-white">
                        {{ __('Grįžti į pasiūlymus') }}
                    </a>
                    <a href="{{ route('make-order') }}"
                        class="border-pink-700 border-2 bg-pink-700 py-2 px-3 text-white rounded-full uppercase text-sm font-semibold tracking-widest hover:bg-pink-800 hover:border-2 hover:border-pink-800">
                        {{ __('Apmokėti') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-front-layout>
