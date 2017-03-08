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

//Route::get('/my','MyController@index');
Route::get('/my', [
    'middleware' => 'auth',
    'uses' => 'MyController@index'
])->name('my');

Route::get('/my/{id}',[
    'uses' => 'MyController@show',
    'middleware' => 'mymiddle'
])->name('myShow');

Route::get('/add','MyController@add')->name('myAdd');

Route::post('/add','MyController@insert')->name('myInsert');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin')->name('userLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister')->name('authRegister');
