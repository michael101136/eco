<?php

namespace App;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CategoriaAlojamiento
 * @package App\Models
 * @version May 23, 2019, 7:25 pm UTC
 *
 * @property string name
 * @property string description
 */
class categoria_blogs extends Model
{
    use SoftDeletes;

    public $table = 'categoria_blogs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'descripcion' => 'required'
    ];

    
}
