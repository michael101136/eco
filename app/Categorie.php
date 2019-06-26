<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorie extends Model
{

    // use SoftDeletes;

    // protected $dates = ['deleted_at'];

    protected $fillable = [
      'language_id',
      'name',
      'img',
      'img_hd',
      'description',
      'status',
      'slug'
    ];

    public function lenguages()
    {
        return $this->hasMany('App\Lenguage');
    }
}
