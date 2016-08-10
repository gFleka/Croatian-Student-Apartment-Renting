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

Route::get('/', function () {    //Ovo sam komentirao
    return view('welcome');
});

// API routes...
Route::get('/api/v1/agencija/{id?}', function($id = null) {
if ($id == null) {
    //$products = App\Product::all(array('id', 'name', 'price'));
} else {
    //$products = App\Product::find($id, array('id', 'name', 'price'));
}
return Response::json(array(
            'error' => false,
            'products' => "Test",
            'status_code' => 200
        ));
});

Route::resource('api/usporedi', 'Agencije\AgencijaController@usporedi');
Route::resource('api', 'Agencije\AgencijaController');



/*Route::get('/api/v1/categories/{id?}', function($id = null) {
if ($id == null) {
    $categories = App\Category::all(array('id', 'name'));
} else {
    $categories = App\Category::find($id, array('id', 'name'));
}
return Response::json(array(
            'error' => false,
            'user' => $categories,
            'status_code' => 200
        ));
});*/