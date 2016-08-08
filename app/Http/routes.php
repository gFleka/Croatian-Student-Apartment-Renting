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

Route::model('korisniks', 'Korisnik');
Route::model('oglas', 'Oglas');


Route::resource('korisniks', 'KorisnikController');
Route::resource('korisniks.oglas', 'OglasController');


Route::get('/', function () {
    return view('welcome');
});


