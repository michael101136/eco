<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    
    protected $table = 'reservations';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'country',
        'fecha',
        'travel_type',
        'number_adults',
        'number_children',
        'message',
        'tour_id',
        'status',
        'lenguaje',
    ];
}

