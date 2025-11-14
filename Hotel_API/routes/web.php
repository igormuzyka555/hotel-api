<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookingController;

Route::get('/', function () {
    return view('welcome');
});


Route::view('/booking-form', 'booking-form'); //форма заполнения
 //API маршруты 
Route::prefix('api')->middleware('api_key')->group(function ()  {
    Route::get('/bookings', [BookingController::class, 'index']);  // Получить все записи
    Route::post('/bookings', [BookingController::class, 'store']); // Создать новую
});
