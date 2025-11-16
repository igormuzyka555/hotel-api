<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller; 
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    //POST бронирования
    public function store(Request $request)
    {
        $data = $request->validate(
            ['first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth'  => 'required|integer|min:1900|max:' . date('Y'),
            'email' => 'required|email',
            'time_in' => 'required|date',
            'days' => 'required|integer|min:1',]);

    $booking = Booking::create($data);
    return response()->json([
        'message' => 'Бронь Создана',
            'data'    => $booking,
        ], 201);


    }
  

    // GET бронирования
        public function index()
    {
        return Booking::all();
    }
}
