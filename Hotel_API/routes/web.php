<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookingController;

Route::get('/', function () {
    return view('welcome');
});

// страница с формой (GET)
Route::get('/booking-form', function () {
    return view('booking-form');
});

// обработка формы (POST, БЕЗ api_key)
Route::post('/booking-form-submit', [BookingController::class, 'store'])
    ->name('booking.form.store');

    