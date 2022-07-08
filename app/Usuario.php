<?php

namespace App;

use App\Traits\DatesTranslator;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Jenssegers\Date\Date;

class Usuario extends Model implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, DatesTranslator;

    public $timestamps = false;

    protected $table = 'usuarios';

    protected $dates = ['fecha_nacimiento'];

    protected $fillable = [
        'nombres',
        'apellidos',
        'email',
        'password',
        'is_superadministrador',
        'fecha_nacimiento'
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
        return $this->nombres . ' ' . $this->apellidos;
    }

    public function getFechaNacimientoAttribute($fechaNacimiento)
    {
        return new Date($fechaNacimiento);
    }

    public function setFechaNacimientoAttribute($value)
    {
        return $this->attributes['fecha_nacimiento'] = date('Y-m-d', strtotime(str_replace("/", "-", $value)));
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

}
