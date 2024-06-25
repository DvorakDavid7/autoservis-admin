<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReservationController extends Controller
{

    public function index(): View
    {
        return view('reservation.index', [
            'reservations' => Reservation::all()
        ]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'date' => 'required',
            'note' => 'nullable',
            'service' => 'required',
        ]);

        return Reservation::create($validated);
    }

    public function show(string $id)
    {
        sleep(1);
        $reservation = Reservation::find($id);
        return [
            "confirmation" => $reservation ? "true" : "false"
        ];
    }
}
