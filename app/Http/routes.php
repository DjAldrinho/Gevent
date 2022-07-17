<?php


use Illuminate\Support\Facades\Route;

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

Route::get('/', static function () {
    return view('welcome');
});


Route::group(['prefix' => 'usuarios'], static function () {
    Route::get('/', 'UsuarioController@index');
    Route::get('create', 'UsuarioController@showRegistrationForm');
    Route::get('show/{id}', 'UsuarioController@show');
    Route::get('edit/{id}', 'UsuarioController@edit');
    Route::get('destroy/{id}', 'UsuarioController@destroy');
    Route::post('store', ['as' => 'register', 'uses' => 'UsuarioController@register']);
    Route::post('edit', ['as' => 'update', 'uses' => 'UsuarioController@update']);
});

Route::group(['prefix' => 'plantilla'], static function () {
    Route::get('/', 'PlantillaController@index');
    Route::get('show/{id}', 'PlantillaController@show');
    Route::post('update/{id}', 'PlantillaController@update');
    Route::post('store', 'PlantillaController@store');
    Route::get('test/{plantilla}', ['as' => 'test-email', 'uses' => 'PlantillaController@testEmail']);
    Route::post('personalizar', 'PlantillaController@personalizar');
});

Route::get('logout', ['as' => 'logout', 'uses' => 'UsuarioController@logout']);
Route::post('login', ['as' => 'login', 'uses' => 'UsuarioController@postLogin']);