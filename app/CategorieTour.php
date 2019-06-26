<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorieTour extends Model
{
    protected $table = 'categories_has_tours';
    protected $fillable = [
      'sub_categorie_id',
      'tour_id'
    ];
}
