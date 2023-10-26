<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Definindo que o campo 'items' é um array
    protected $casts = [
        'items' => 'array'
    ];

    // Definindo que o campo 'date' será tratado como uma data
    protected $dates = ['date'];
}
