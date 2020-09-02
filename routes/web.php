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
Route::get('/clientes/criar', 'clientesController@create')->name('incluir_cliente');
Route::post('/clientes/criar', 'clientesController@store');
Route::get('/clientes/alterar/{id}', 'clientesController@edit')->name('alterar_cliente');
Route::post('/clientes/alterar/{id}', 'clientesController@update');
Route::delete('/clientes/{id}', 'clientesController@destroy');

Route::get('/produtos', 'produtosController@index')->name('listar_produtos');
Route::get('/produtos/criar', 'produtosController@create')->name('incluir_produto');
Route::post('/produtos/criar', 'produtosController@store');
Route::get('/produtos/alterar/{id}', 'produtosController@edit')->name('alterar_produto');
Route::post('/produtos/alterar/{id}', 'produtosController@update');
Route::delete('/produtos/{id}', 'produtosController@destroy');

