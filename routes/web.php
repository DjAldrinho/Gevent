<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Gevent\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'usuarios'], function () {
    Route::get('create', 'Auth\RegisterController@showRegistrationForm');
    Route::get('list', 'UserController@index');
    Route::get('destroy/{id}', 'UserController@destroy');
    Route::post('store', ['as' => 'register', 'uses' => 'Auth\RegisterController@register']);
    Route::get('change-password', 'UserController@getChangePassword');
    Route::post('change-password', ['as' => 'c-password', 'uses' => 'UserController@postChangePassword']);
});

Route::get('contacto', function () {
    dd("Pagina de contacto");
});
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
Route::post('login', ['as' => 'login', 'uses' => 'Auth\LoginController@login']);


Route::get('/insert', function () {
    $users = factory(Gevent\User::class, 3)->create();

    return "Registrado con exito";
});


Route::get('/prueba', function () {

    $fechaActual = Carbon::today();
    $fechaHoy = Carbon::now();
    $primerDiaMes = $fechaHoy->firstOfMonth();

    $primerDia = false;

    $usuarios = User::all();
    $usuariosMensual = array();
    $usuariosDia = array();


    if ($fechaActual->eq($primerDiaMes)) {
        $primerDia = true;
    }

    foreach ($usuarios as $usuario) {
        if (($usuario->fecha_nacimiento->day == $fechaActual->day) && ($usuario->fecha_nacimiento->month == $fechaActual->month)) {
            if (enviarCorreoPersonal($usuario)) {
                echo "Correos enviados personal<br/>";
            }
            array_push($usuariosDia, $usuario);
        }

        if ($primerDia) {
            if ($usuario->fecha_nacimiento->month == $fechaActual->month) {
                array_push($usuariosMensual, $usuario);
            }
        }
    }


    if ($primerDia) {
        if (enviarCorreoMensual($usuariosMensual)) {
            echo "Correos enviados mensual <br/>";
        }
    }

    if (count($usuariosDia) > 0) {
        if (enviarCorreoDiario($usuariosDia)) {
            echo "Correos enviados diarios <br/>";
        }
    }

});

function enviarCorreoDiario($usuarios)
{
    Mail::send('emails.diario',
        ['usuarios' => $usuarios],
        function ($message) {
            $message->to('auxiliarsoftware1@unisinucartagena.edu.co')
                ->subject('Feliz Cumpleaños a todos');
        });
    return true;
}

function enviarCorreoPersonal($usuario)
{

    Mail::send('emails.personal',
        ['usuario' => $usuario],
        function ($message) use ($usuario) {
            $message->to('coordsoftware@unisinucartagena.edu.co')
                ->subject('Happy Birthday ' . $usuario->getNombreCompleto());
        });

    return true;
}


function enviarCorreoMensual($usuarios)
{
    Mail::send('emails.mensual',
        ['usuarios' => $usuarios],
        function ($message) {
            $message->to('auxiliarsoftware1@unisinucartagena.edu.co')
                ->subject('Happy Birthday ');
        });

    return true;

}