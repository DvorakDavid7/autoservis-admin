<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reservations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($reservations as $reservation)
                <div class="mb-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p>{{ $reservation->name }} {{ $reservation->surname }}
                        <p>{{ $reservation->service }}</p>
                        <p>{{ $reservation->date }}</p>
                        <p>{{ $reservation->email }}, {{ $reservation->phone }}</p>

                        <hr>
                        <p>{{ $reservation->note }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
