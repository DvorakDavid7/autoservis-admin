<div>
    <p>
        <b>Nová rezervace</b>
    </p>
    <p>
        Detaily rezervace:
    </p>
    <p>
        <br>
        Zákazník: {{ $reservation->name }} {{ $reservation->surname }}<br>
        Služba: {{ $reservation->service }}<br>
        Datum: {{ $reservation->date }}<br>
        Kontakt: {{ $reservation->email }}, {{ $reservation->phone }}<br>

        <br>
    <hr>
    Poznámka: {{ $reservation->note }}
    <p>
</div>
