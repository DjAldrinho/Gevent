<?php

namespace Gevent\Http\Controllers\Auth;

use Gevent\Http\Controllers\Controller;
use Gevent\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Validator;

class RegisterController extends Controller
{
    /*

|--------------------------------------------------------------------------
    | Register Controller

|--------------------------------------------------------------------------
    |
    | This controller handles
the registration of new users as well as their
    | validation and creation. By default this controller uses
a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use
        RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a
     * validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate
    \Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return
            Validator::make($data, [
                'name' => 'required|max:255',
                'lastname' => 'required|max:255',
                'identificacion' => 'required|max:255|unique:users',
                'genero' => 'boolean|required|max:255',
                'area' => 'required',
                'fecha_nacimiento' => 'required',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'required',
            ]);
    }

    /**
     * Create a new user instance after a
     * valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'identificacion' => $data['identificacion'],
            'genero' => $data['genero'],
            'area' => $data['area'],
            'rol' => !isset($data['rol']) ? 'empleado' : $data['rol'],
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
