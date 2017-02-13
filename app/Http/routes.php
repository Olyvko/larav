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

Route::get('/my','MyController@index');

Route::get('/my/{id}','MyController@show')->name('myShow');

Route::get('/add','MyController@add')->name('myAdd');

Route::post('/add','MyController@insert')->name('myInsert');
