<x-back-layout>
    <div class="flex flex-col gap-5 bg-gray-100 min-h-screen pt-28">
        <div class="container">
            @forelse ($hotels as $hotel)
                <div class="grid grid-cols-4 items-center justify-between gap-5 mx-auto max-w-fit">
                    <p>{{ $hotel->country }}</p>
                    <p>{{ $hotel->title }}</p>
                    <p>{{ $hotel->desc }}</p>
                    <p>{{ $hotel->price }}</p>
                    <p>{{ $hotel->image }}</p>
                    <p>{{ $hotel->duration }}</p>

                    <div class="flex gap-3">
                        <x-primary-button>
                            {{ __('Edit') }}
                        </x-primary-button>
                        <x-primary-button>
                            {{ __('Delete') }}
                        </x-primary-button>
                    </div>
                </div>
            @empty
                <p>Nepridėtas nė vienas viešbutis.</p>
            @endforelse
        </div>
    </div>
</x-back-layout>
