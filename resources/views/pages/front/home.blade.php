<x-front-layout>
    <div class="min-h-[90vh] min-w-full bg-[url('/public/assets/img/hero.jpg')] bg-cover bg-no-repeat pt-32 pr-32">
        <div class="flex flex-col items-end gap-7">
            <h1 class="primary-heading text-white text-right ml-auto text-8xl w-3/5">Leisk sau magiškus
                nuotykius!
            </h1>
            <p class="text-green-500 font-light text-lg">Unikaliausi viešbučiai visame pasaulyje</p>
            <a href="{{ route('offers') }}"
                class="bg-pink-700 py-3 px-4 text-white rounded-full mb-3 flex gap-1 uppercase text-sm font-semibold tracking-widest drop-shadow-md hover:bg-pink-800">
                {{ __('Visi pasiūlymai') }}
            </a>
        </div>
    </div>
</x-front-layout>
