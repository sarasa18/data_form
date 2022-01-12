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

Route::get('data/index', 'DataFormController@index');
Route::group(['prefix' => 'data', 'middleware' => 'auth'], function () {
    Route::get('index', 'DataFormController@index')->name('data.index');
    Route::get('create', 'DataFormController@create')->name('data.create');
    Route::post('store', 'DataFormController@store')->name('data.store');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
