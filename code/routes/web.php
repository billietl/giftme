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
    return view('layouts.master');
});

Route::get('/signup', 'RegisterController@create');
Route::post('/signup', 'RegisterController@store');

Route::get('/login', 'SessionController@create');
Route::post('/login', 'SessionController@store');

Route::get('/logout', 'SessionController@destroy');
Route::post('/logout', 'SessionController@destroy');
