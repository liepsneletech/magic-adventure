@inject('cart', 'App\Services\CartService')
<x-front-layout>
    <div class="bg-gray-100 min-h-screen py-12">
        <div class="container">
            <h1
                class="text-center text-pink-600 mb-8 text-4xl font-['Bebas_Neue'] justify-self-center col-start-1 col-end-2 row-start-1 row-end-2">
                Jūsų krepšelis
            </h1>
            <form method="post" action="{{ route('update-cart') }}">
                @csrf
                @method('put')

                <div class="flex flex-col px-8 py-7 bg-green-500 text-white rounded-lg w-2/3 mx-auto">
                    @forelse($cart->list as $offer)
                        <div
                            class="flex
                        flex-nowrap justify-between items-center border-b border-white border-opacity-30 py-2">

                            <div class="flex items-center gap-5">
                                <img src="{{ asset($offer->hotel->image) }}"
                                    class="w-[90px]  h-auto border-2 border-white border-opacity-60 rounded-md">
                                <p>{{ $offer->title }} | <span class="text-sm">{{ $offer->travel_start }} -
                                        {{ $offer->travel_end }}</span></p>
                            </div>

                            <div class="grid grid-cols-3 gap-12 items-center">
                                <div class="flex align-center gap-3 ">
                                    <input type="number" min="1" name="count[]" value="{{ $offer->count }}"
                                        class="text-center w-[60px] rounded-full bg-white text-green-500 border-0 focus:ring-0 focus:ring-offset-0">
                                    <input type="hidden" name="ids[]" value="{{ $offer->id }}">
                                </div>

                                <p>{{ $offer->sum }} &euro;</p>

                                <button type="submit" name="delete" value="{{ $offer->id }}"
                                    class="btn btn-outline-danger text-lg"><i
                                        class="fa-solid fa-circle-xmark text-green-500 bg-white p-1 rounded-lg"></i></button>
                            </div>
                        </div>

                    @empty
                        <span class="dropdown-item">Krepšelis tuščias</span>
                    @endforelse
                    <div class="flex justify-between items-center pt-10">
                        <p>VISO:</p>
                        <p class="text-lg">{{ $cart->total }} &euro;</p>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 mt-9 w-2/3 mx-auto">
                    <button type="submit"
                        class="border-green-500 border-2 py-2 px-3 text-green-500 rounded-full uppercase text-sm font-bold tracking-widest hover:bg-green-500 hover:text-white">
                        {{ __('Atnaujinti') }}
                    </button>

                </div>
            </form>
            <form action="{{ route('make-order') }}" method="post"
                class="flex items-center justify-end mt-3 w-2/3 mx-auto">
                @csrf

                <button type="submit"
                    class="w-[120px] border-pink-700 border-2 bg-pink-700 py-2 px-3 text-white rounded-full uppercase text-sm font-semibold tracking-widest hover:bg-pink-800 hover:border-2 hover:border-pink-800 disabled:bg-gray-500 disabled:border-gray-500 disabled:border-2 disabled:hover:border-gray-500"
                    @if ($cart->total == 0) disabled @endif>
                    {{ __('Apmokėti') }}
                </button>
            </form>
        </div>
    </div>
</x-front-layout>
