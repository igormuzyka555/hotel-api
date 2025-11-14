<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use function Symfony\Component\Translation\t;

class Booking extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'birth',
        'email',    
        'time_in',      
        'days', 
    ];
}
