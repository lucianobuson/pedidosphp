<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/pedidosphp', 'HomeController@index')->name('home');
Route::get('/clientes', 'clientesController@index')->name('listar_clientes');
Route::get('/clientes/criar', 'clientesController@create')->name('form_incluir_cliente');
Route::post('/clientes/criar', 'clientesController@store');
Route::delete('/clientes/{id}', 'clientesController@destroy');

