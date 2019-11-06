<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('/productos','ProductoController');
Route::resource('/categorias','CategoriaController');
Route::resource('/imagenes','ImagenController');

Route::get('/producto/{url}', 'ProductoController@show');

Route::post('/correos', 'CorreosController@correoContacto');
Route::post('/correo.cotizacion', 'CorreosController@correoCotizacion');