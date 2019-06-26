<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  protected $table = 'images';
  protected $fillable = [
    'multimedia_id',
    'name',
    'path',
    'size'
  ];
}
