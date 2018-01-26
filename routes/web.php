<?php

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

Route::get('/', function () {
    return view('auth.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/home/configuracion','ConfiguracionController@index');
Route::get('/home/perfil', 'PerfilController@index');
Route::get('/home/edit/{id}', 'PerfilController@edit');
Route::post('/home/perfil', 'PerfilController@update');
Route::post('/home/save', 'HomeController@createBook')->middleware('auth');
Route::post('/home', 'HomeController@createBookByIsbn')->middleware('auth');
Route::get('/home/lista', 'ListBookController@index');
