<?php

namespace App\Http\Controllers;

use App\Mail\ReservationCreated;
use App\Mail\ReservationDetail;
use App\Models\Reservation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
        $reservation = Reservation::find($id);

        if ($reservation == null) {
            return response()->json([
                'confirmation' => 'false'
            ]);
        }

        if (!$reservation->notified) {
            Mail::to($reservation->email)->send(new ReservationCreated($reservation));
            Mail::to('dvorakdavid7@gmail.com')->send(new ReservationDetail($reservation));
            Mail::to('data@advantup.cz')->send(new ReservationDetail($reservation));
            $reservation->update(['notified' => true]);
        }

        return response()->json([
            'confirmation' => 'true'
        ]);
    }

    public function all(): JsonResponse
    {
        $reservations = Reservation::all();
        return response()->json($reservations);
    }
}
