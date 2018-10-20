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

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/list', 'TaskController@index')->name('list');
Route::post('/list', 'TaskController@index')->name('list');

Route::get('/create', 'TaskController@create')->name('create');
Route::post('/save', 'TaskController@save')->name('save');

Route::get('/edit', 'TaskController@edit')->name('edit');
Route::post('/update', 'TaskController@update')->name('update');

Route::delete('/destroy', 'TaskController@destroy')->name('destroy');