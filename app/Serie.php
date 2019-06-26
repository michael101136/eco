<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $table = 'series';

    protected $fillable = [
        'tour_id',
        'cant_person',
        'date_start',
        'date_end',
        'status'
    ];
}
