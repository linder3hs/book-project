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

Route::post('/home', 'HomeController@searchIsbn');
/*Route::get('/scrapper', function() {
    $crawler = Goutte::request('GET', 'https://www.iberlibro.com/servlet/SearchResults?ds=20&isbn=9780545010221&sts=t');
    $crawler->filter('h1')->each(function ($node) {
        dump($node->text());
    });
    return view('scrapper');
});*/
