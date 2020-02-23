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

Auth::routes();

Route::get('/home', 'UserController@index');
Route::get('/movies', 'MovieController@index');
Route::post('/add-movie', 'MovieUserController@store');
// Route::get('/home', 'HomeController@index')->name('home');
