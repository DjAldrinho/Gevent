<?php


use App\Plantilla;
use App\Usuario;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Jenssegers\Date\Date;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'usuarios'], function () {
    Route::get('/', 'UsuarioController@index');
    Route::get('create', 'UsuarioController@showRegistrationForm');
    Route::get('show/{id}', 'UsuarioController@show');
    Route::get('edit/{id}', 'UsuarioController@edit');
    Route::get('destroy/{id}', 'UsuarioController@destroy');
    Route::post('store', ['as' => 'register', 'uses' => 'UsuarioController@register']);
    Route::post('edit', ['as' => 'update', 'uses' => 'UsuarioController@update']);
    /* Route::get('change-password', 'UsuarioController@getChangePassword');
     Route::post('change-password', ['as' => 'c-password', 'uses' => 'UsuarioController@postChangePassword']);*/
});

Route::group(['prefix' => 'plantilla'], function () {
    Route::get('/', 'PlantillaController@index');
    Route::get('show/{id}', 'PlantillaController@show');
    Route::post('update/{id}', 'PlantillaController@update');
    Route::post('store', 'PlantillaController@store');
    Route::get('test/{plantilla}', ['as' => 'test-email', 'uses' => 'PlantillaController@testEmail']);
    Route::post('personalizar', 'PlantillaController@personalizar');
});


Route::get('logout', ['as' => 'logout', 'uses' => 'UsuarioController@logout']);
Route::post('login', ['as' => 'login', 'uses' => 'UsuarioController@postLogin']);


Route::get('/insert', function () {
    factory(Usuario::class, 10)->create();
    return "Registrado con exito";
});


Route::get('/reset', function () {
    return Artisan::call('migrate');
});


Route::get('/prueba', function () {

    DB::table('usuarios')->insert([
        'nombres' => 'Aldray',
        'apellidos' => 'Narvaez',
        'email' => 'sadmin@gevent.com',
        'password' => bcrypt('012417'),
        'fecha_nacimiento' => Carbon::now(),
        'is_superadministrador' => true,
    ]);

    dd("Creado!");

});
