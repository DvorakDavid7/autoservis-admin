<?php

use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ReservationController::class, "index"])->name("reservation.index");
Route::post('/', [ReservationController::class, "store"]);
