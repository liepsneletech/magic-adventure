@inject('cart', 'App\Services\CartService')

<nav x-data="{ open: false }" class="border-b border-gray-100 py-4">

    <!-- Primary nav Menu -->
    <div class="container flex justify-between items-center h-16">
        <!-- Logo -->
        <div class="shrink-0 flex items-center">
            <a href="{{ route('index') }}">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
            </a>
        </div>

        <!-- nav Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Pradžia') }}
            </x-nav-link>
            <x-nav-link :href="route('offers')" :active="request()->routeIs('offers')">
                {{ __('Pasiūlymai') }}
            </x-nav-link>
            <x-nav-link :href="route('index')" :active="request()->routeIs('about')">
                {{ __('Apie mus') }}
            </x-nav-link>
            <x-nav-link :href="route('index')" :active="request()->routeIs('info')">
                {{ __('Naudinga informacija') }}
            </x-nav-link>
        </div>

        @auth
            <div class="flex align-center">
                <div class="sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="80">
                        <x-slot name="trigger">
                            <button class="flex items-center">
                                <i class="fa-solid fa-basket-shopping text-gray-500 text-lg pb-2 mr-1"></i>
                                <span
                                    class="w-5 h-5 text-sm text-center text-white bg-pink-600 rounded-full -translate-x-2 -translate-y-4">{{ $cart->count }}
                                </span>
                                {{-- <span class="mt-1 text-gray-600">{{ $cart->total }} &euro;</span> --}}
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="flex flex-col px-5 py-3 bg-green-500 text-white rounded-t-lg">
                                @csrf
                                @forelse($cart->list as $offer)
                                    <div
                                        class="flex
                                flex-nowrap justify-between border-b border-white border-opacity-30 py-2">
                                        <div>
                                            {{ $offer->title }}
                                            <b>x {{ $offer->count }}</b>
                                        </div>
                                        <p>{{ $offer->sum }} &euro;</p>
                                    </div>
                                @empty
                                    <span class="dropdown-item">Krepšelis tuščias</span>
                                @endforelse
                                <div class="flex justify-between items-center pt-3">
                                    <p>VISO:</p>
                                    <p>{{ $cart->total }} &euro;</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-end gap-3 p-3">
                                <a href="{{ route('cart') }}"
                                    class="border-green-500 border-2 py-2 px-3 text-green-500 rounded-full uppercase text-xs font-bold tracking-widest hover:bg-green-500 hover:text-white">
                                    {{ __('Krepšelis') }}
                                </a>
                                <a href="#"
                                    class="border-pink-700 border-2 bg-pink-700 py-2 px-3 text-white rounded-full uppercase text-xs font-semibold tracking-widest hover:bg-pink-800 hover:border-2 hover:border-pink-800">
                                    {{ __('Pirkimas') }}
                                </a>
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>

                <div class="nav-front-logged-in">
                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <div class="bg-green-500 rounded-lg">
                                    <x-dropdown-link :href="route('profile.edit')" class="text-white hover:text-green-500 rounded-t-lg">
                                        {{ __('Paskyra') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('user-orders')" class="text-white hover:text-green-500">
                                        {{ __('Užsakymai') }}
                                    </x-dropdown-link>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                            this.closest('form').submit();"
                                            class="text-white hover:text-green-500 rounded-b-lg">
                                            {{ __('Atsijungti') }}
                                        </x-dropdown-link>
                                    </form>
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Responsive nav Menu -->
                    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
                        <div class="pt-2 pb-3 space-y-1">
                            <x-responsive-nav-link :href="route('index')" :active="request()->routeIs('index')">
                                {{ __('Pradžia') }}
                            </x-responsive-nav-link>
                        </div>

                        <!-- Responsive Settings Options -->
                        <div class="pt-4 pb-1 border-t border-gray-200">
                            <div class="px-4">
                                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                            </div>

                            <div class="mt-3 space-y-1">
                                <x-responsive-nav-link :href="route('profile.edit')">
                                    {{ __('Paskyra') }}
                                </x-responsive-nav-link>

                                <x-responsive-nav-link :href="route('profile.edit')">
                                    {{ __('Užsakymai') }}
                                </x-responsive-nav-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Atsijungti') }}
                                    </x-responsive-nav-link>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endauth
        @guest
            <div class="nav-front-logged-out flex gap-5">
                <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                    {{ __('Prisijungti') }}
                </x-nav-link>
                <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                    {{ __('Registruotis') }}
                </x-nav-link>
            </div>
        @endguest
    </div>
</nav>
