<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itinerarie extends Model
{
   
   protected $fillable = [
      'name',
      'description',
      'day',
      'department',
      'province',
      'district',
      'altitud',
      'latitud',
      'icono',
      'photo'
    ];
}
