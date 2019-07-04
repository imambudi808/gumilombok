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
    return view('welcome');
});

Route::get('wisata','WisataController@index')->middleware('api');
Route::post('wisata','WisataController@insertWisata');
Route::put('/wisata/{id}','WisataController@updateWisata');

Route::delete('/wisata/{id}','WisataController@deleteWisata');

Route::get('/email','EmailController@showForm');
Route::post('/email','EmailController@sub');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
