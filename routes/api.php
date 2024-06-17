<?php

use App\Http\Controllers\ReservationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/reservation', [ReservationController::class, 'store']);
Route::get('/reservation/{id}', [ReservationController::class, 'show']);
