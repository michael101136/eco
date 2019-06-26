<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $table = 'encuesta';
    public $timestamps = false;
    protected $fillable = [
        'codigo_viaje',
        'nombres_apellidos',
        'fecha',
        'acompanante',
        'impresion_global',
        'ig_comentario',
        'i_organizacion',
        'i_transporte',
        'i_chofer',
        'i_comentario',
        'g_conocimiento',
        'g_simpatia',
        'g_eficacia',
        'g_comunicacion',
        'g_comentario',
        'alojamiento_limpieza',
        'alojamiento_servicio',
        'alojamiento_comentario',
        'comida_cantidad',
        'comida_servicio',
        'c_comentario',
        'le_gusto',
        'no_le_gusto',
        'status',
        'language',
        'email',
        'recomendaria',
        'contactarnos'
    ];




}
