<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plantilla extends Model
{

    protected  $table = 'plantillas';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'tipo_plantilla',
        'mensaje',
        'imagen_uno',
        'imagen_dos',
        'imagen_tres',
        'imagen_cuatro',
        'imagen_cinco',
        'fecha_nacimiento',
    ];
}
