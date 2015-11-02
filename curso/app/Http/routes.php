<?php

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
    return view('index');
});



/*
 * Rotas para o controller FeiraController
 */
Route::get('feira', 'FeiraController@index');
Route::get('feira/{id}', 'FeiraController@show');




/*
 * Rotas para o controller UsuarioController
 */
Route::get('usuario', 'UsuarioController@index');
Route::get('usuario/novo', 'UsuarioController@novo');
Route::get('usuario/{id}', 'UsuarioController@show');