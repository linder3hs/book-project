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
Route::get('/home/publicaciones', 'PublishedController@index');
Route::post('/home/publicaciones', 'PublishedController@storage');
Route::post('/home/comment', 'PublishedController@comment');
Route::get('/home/preguntas','PreguntasController@index');
Route::get('/home/respuestas','RespuestaController@index');
Route::get('/admin/login', 'AdminController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'AdminController@login')->name('admin.login.submit');
Route::get('/admin/preguntas', 'AdminController@preguntas')->name('admin.dashboard');