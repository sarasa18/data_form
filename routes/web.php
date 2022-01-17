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
    Route::get('show/{id}', 'DataFormController@show')->name('data.show');
    Route::get('edit/{id}', 'DataFormController@edit')->name('data.edit');
    Route::post('update/{id}', 'DataFormController@update')->name('data.update');
    Route::post('destroy/{id}', 'DataFormController@destroy')->name('data.destroy');
});

Route::get('shops/index', 'ShopController@index');


Auth::routes();

Route::get('/home', 'DataFormController@index')->name('home');
