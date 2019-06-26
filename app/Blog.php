<?php

namespace App;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Blog
 * @package App\Models
 * @version June 7, 2019, 9:34 pm UTC
 *
 * @property string usuario_id
 * @property string categoria_blog_id
 * @property string titulo
 * @property string url
 * @property string fechaPublicacion
 * @property string estado
 * @property string contenido
 * @property string contador
 */
class Blog extends Model
{
    use SoftDeletes;

    public $table = 'blogs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id',
        'usuario_id',
        'categoria_blog_id',
        'titulo',
        'url',
        'fechaPublicacion',
        'estado',
        'contenido',
        'contador',
        'autor',
        'urlimagen',
        'descripcioncorta',
        'language'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'usuario_id' => 'string',
        'categoria_blog_id' => 'string',
        'titulo' => 'string',
        'url' => 'string',
        'fechaPublicacion' => 'string',
        'estado' => 'string',
        'contenido' => 'string',
        'contador' => 'string',
        'autor'=>'string',
        'urlimagen'=>'string',
        'descripcioncorta'=>'string',
        'language'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'usuario_id' => 'required',
        'categoria_blog_id' => 'required',
        'titulo' => 'required',
        // 'url' => 'required',
        'fechaPublicacion' => 'required',
        'contenido' => 'required',
        'autor' => 'required',
        'descripcioncorta'=>'required',
    ];

    
}
