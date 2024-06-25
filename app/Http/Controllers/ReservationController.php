<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\JsonResponse;
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
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'date' => 'required|date_format:m/d/Y H:i',
            'note' => 'nullable|string|max:1000',
            'service' => 'required|string|max:255'
        ]);

        return Reservation::create($validated);
    }

    public function show(string $id): JsonResponse
    {
        sleep(1);
        $reservation = Reservation::find($id);
        return response()->json([
            "confirmation" => $reservation ? "true" : "false"
        ]);
    }

    public function all(): JsonResponse
    {
        $reservations = Reservation::all();
        return response()->json($reservations);
    }
}
