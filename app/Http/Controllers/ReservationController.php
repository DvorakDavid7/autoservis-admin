<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function index()
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
        return [
            "message" => "ok"
        ];
    }
}
