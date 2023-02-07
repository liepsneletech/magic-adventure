<x-back-layout>
    <div class="flex flex-col gap-5 bg-gray-100 min-h-screen pt-28">
        <div class="container flex flex-col gap-5">
            @forelse ($countries as $country)
                <div class="grid grid-cols-4 items-center justify-between gap-5 mx-auto max-w-fit">
                    <p>{{ $country->country_name }}</p>
                    <p>{{ $country->season_start }}</p>
                    <p>{{ $country->season_end }}</p>

                    <div class="flex gap-3">
                        <a href="{{ route('edit-back-country', $country) }}">
                            <x-primary-button>
                                {{ __('Edit') }}
                            </x-primary-button>
                        </a>
                        <form action="{{ route('delete-back-country', $country) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <x-primary-button>
                                {{ __('Delete') }}
                            </x-primary-button>
                        </form>
                    </div>
                </div>
            @empty
                <p>Nepridėta nė viena šalis.</p>
            @endforelse
        </div>
    </div>
</x-back-layout>
