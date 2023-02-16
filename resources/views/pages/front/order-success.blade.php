@inject('cart', 'App\Services\CartService')

<x-front-layout>
    <div class="bg-gray-100 min-h-screen py-12">
        <h1
            class="text-center text-pink-600 mb-8 text-4xl font-['Bebas_Neue'] justify-self-center col-start-1 col-end-2 row-start-1 row-end-2">
            Užsakymas sėkmingas
        </h1>
        <div class="container flex justify-center">
            <div class="grid grid-cols-2 justify-start bg-white w-[720px] rounded-lg overflow-hidden">
                <img src="/assets/img/order-success-img.png" alt="Travel photo" class="w-[360px] inline-block">
                <div class="flex flex-col gap-5 justify-between p-10 pb-6">
                    <div>
                        <b class="text-pink-600 text-xl">Ačiū, {{ Auth::user()->name }}, </b>
                        <p class="mb-10 text-gray-600">Jūs sėkmingai pateikėte užsakymą.</p>
                        <div class="flex flex-col items-center justify-end gap-3 p-3">
                            <a href="{{ route('user-orders') }}"
                                class="w-[200px] border-pink-700 border-2 bg-pink-700 py-2 px-3 text-white rounded-full uppercase text-xs font-semibold tracking-widest hover:bg-pink-800 hover:border-2 hover:border-pink-800">
                                {{ __('Peržiūrėti užsakymus') }}
                            </a>
                            <a href="{{ route('offers') }}"
                                class="text-center w-[200px] border-green-500 border-2 py-2 px-3 text-green-500 rounded-full uppercase text-xs font-bold tracking-widest hover:bg-green-500 hover:text-white">
                                {{ __('Grįžti į pasiūlymus') }}
                            </a>
                        </div>
                    </div>
                    <h3 class="text-center text-green-500 text-2xl font-['Bebas_Neue']">
                        Ruoškis magiškam nuotykiui!
                    </h3>
                </div>
            </div>
        </div>
    </div>
</x-front-layout>
