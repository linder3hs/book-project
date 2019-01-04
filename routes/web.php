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

//User normal
# GET
Route::get('/home', 'HomeController@index');
Route::get('/home/configuracion','ConfiguracionController@index');
Route::get('/home/perfil', 'PerfilController@index');
Route::get('/home/edit/{id}', 'PerfilController@edit');
Route::get('/home/lista', 'ListBookController@index');
Route::get('/home/all', 'ListBookController@listAllBooks');
Route::get('/home/publicaciones', 'PublishedController@index');
Route::get('/home/preguntas/{id}','PreguntasController@index');
Route::get('/home/respuestas','RespuestaController@index');
Route::get('/home/nuevaspreguntas', 'NewPreguntas@index');

//User normal
# POST
Route::post('/home/perfil', 'PerfilController@update');
Route::post('/home/save', 'HomeController@createBook')->middleware('auth');
Route::post('/home', 'HomeController@createBookByIsbn')->middleware('auth');
Route::post('/home/publicaciones', 'PublishedController@storage');
Route::post('/home/comment', 'PublishedController@comment');
Route::post('/home/createpregunta', 'NewPreguntas@newPregunta');
Route::post('/home/solicitarExamen', 'ListBookController@solicitarCertificacion');
Route::post('/home/procesarPreguntas', 'PreguntasController@procesarPreguntas');

// Admin Routes
# GET
Route::get('/admin/login', 'Admin\AdminController@showLoginForm')->name('admin.login');
Route::get('/admin/preguntas', 'Admin\AdminController@preguntas')->name('admin.dashboard');
Route::get('/admin/usuarios', 'Admin\ListUserAdminController@listuser');
Route::get('admin/certificacion', 'Admin\CertificacionUserAdminController@certificacion');
Route::get('admin/user/certificate', 'Admin\CertificacionUserAdminController@index');
Route::get('admin/user/detail/{id}', 'Admin\CertificacionUserAdminController@detailUsercertificate');
Route::get('/admin/preguntas', 'Admin\PreguntasAdminController@index');

# POST
Route::post('/admin/login', 'Admin\AdminController@login')->name('admin.login.submit');
Route::post('/admin/updatenivel', 'Admin\ListUserAdminController@updatenivel');
Route::post('admin/aprobarCertificacion', 'Admin\CertificacionUserAdminController@aprobarCertificacion');
Route::post('admin/certificate/aprobar', 'Admin\CertificacionUserAdminController@aprobarUserCertificate');
Route::post('/admin/setAsk', 'Admin\PreguntasAdminController@setAskAdmin');

// Social Login
Route::get('auth/facebook', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\RegisterController@handleProviderCallback');

