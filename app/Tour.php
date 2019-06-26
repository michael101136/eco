<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable = [
      'name',
      'img',
      'description_short',
      'description_complete',
      'organization',
      'meta_description',
      'meta_keywords',
      'multimedia_id',
      'status',
      'slug',
      'tipo_tour',
      'tipo_viaje',
      'price',
      'price_can'
    ];
}
