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
    return view('welcome');
});


Route::auth();


Route::resource('oglas', 'OglasController');
Route::resource('oglasview', 'OglasViewController');
Route::resource('queries', 'QueriesController');


//Route::resource('users', 'UserController');		//<! Empty for now


