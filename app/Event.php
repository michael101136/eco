<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;
class Event extends Model
{
    //use SoftDeletes;
    protected $table = 'events';
    protected $fillable = [
      'name',
      'fecha_inicio',
      'fecha_fin',
      'description',
      'place',
      'img',
    ];
}
