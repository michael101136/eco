<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'prices';
    protected $fillable = [
      'tour_id',
      'range_first',
      'range_end',
      'monto'
    ];
}
