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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin','AdminController@index')->name('admin');

Route::get('/user','UserController@index')->name('user');
Route::post('/user/save','UserController@store');

Route::get('/renting','RentController@index')->name('renting');
Route::post('/rent/{id}','RentController@edit');
Route::post('/renting/update/{id}','RentController@update');
Route::any('/renting/delete/{id}','RentController@destroy');
Route::post('/renting/create','RentController@store');
