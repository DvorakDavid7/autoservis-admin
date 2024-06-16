<x-layout>
    @foreach($reservations as $reservation)
        <p>{{ $reservation->name }}</p>
        <p>{{ $reservation->surname }}</p>
    @endforeach
</x-layout>
