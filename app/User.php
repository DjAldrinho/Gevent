<?php

namespace Gevent;

use Gevent\Traits\DatesTranslator;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Jenssegers\Date\Date;

class User extends Authenticatable
{

    use Notifiable, SoftDeletes, DatesTranslator;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    public $timestamps = true;

    protected $dates = ['fecha_nacimiento',
        'deleted_at'];

    protected $fillable = [
        'name',
        'lastname',
        'identificacion',
        'email',
        'password',
        'genero',
        'area',
        'fecha_nacimiento',
        'rol'
    ];

    /**
     * The attributes that
     * should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function getNombreCompleto()
    {
        return $this->name
        . ' ' . $this->lastname;
    }

    public function getFechaNacimientoAttribute($fecha_nacimiento)
    {
        return new Date($fecha_nacimiento);
    }

    public function setFechaNacimientoAttribute($value)
    {
        return $this->attributes['fecha_nacimiento'] = date('Y-m-d', strtotime(str_replace("/", "-",
            $value)));
    }

}
