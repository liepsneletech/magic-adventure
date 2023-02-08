<x-front-layout>
    <div class="min-h-screen bg-[url('/public/assets/img/hero.jpg')] bg-contain bg-no-repeat py-32 pr-32">
        <div class="flex flex-col items-end gap-7">
            <h1 class="primary-heading text-white text-right ml-auto text-8xl w-3/5">Leiskites i magiškus nuotykius!
            </h1>
            <p class="text-white font-light text-md font-['Roboto']">Unikaliausi viešbučiai visame pasaulyje</p>
            <a href="{{ route('admin-offers-index') }}"
                class="bg-pink-700 py-3 px-4 text-white rounded-md mb-3 flex gap-1 uppercase text-s font-semibold tracking-widest drop-shadow-md hover:bg-pink-800"><span
                    class="material-symbols-rounded">
                    magic_button
                </span>
                {{ __('Visi pasiūlymai') }}
            </a>
        </div>
    </div>
</x-front-layout>
