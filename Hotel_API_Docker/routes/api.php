<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookingController;

// Все API-маршруты для n8n / внешних клиентов
Route::middleware('api_key')->group(function () {
    Route::get('/bookings', [BookingController::class, 'index']);
    Route::post('/bookings', [BookingController::class, 'store']);
});
