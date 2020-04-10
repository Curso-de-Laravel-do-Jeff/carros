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
    return redirect('/login');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'home', 'middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('cars.index');
    Route::get('/show/{id}', 'HomeController@show')->name('cars.show');
    Route::get('/create', 'HomeController@create')->name('cars.create');
    Route::post('/store', 'HomeController@store')->name('cars.store');
    Route::get('/edit/{id}', 'HomeController@edit')->name('cars.edit');
    Route::put('/update/{id}', 'HomeController@update')->name('cars.update');
});
