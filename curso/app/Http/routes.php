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
Route::get('/feira/listar', 'FeiraController@index');
Route::get('/feira/nova', 'FeiraController@action_nova');
Route::post('/feira/criar', 'FeiraController@create');
Route::get('/feira/ver/{id}', 'FeiraController@show');
Route::any('/feira/update/{id}', 'FeiraController@update');
Route::any('/feira/manager/{id}', 'FeiraController@manager');




/*
 * Rotas para o controller UsuarioController
 */
Route::get('usuario', 'UsuarioController@index');
Route::get('usuario/novo', 'UsuarioController@action_novo');
Route::get('usuario/{id}', 'UsuarioController@show');