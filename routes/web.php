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

Route::get('/home', 'HomeController@index');

Route::get('/clients', 'ClientsController@index')->name('clients');

Route::get('/clients/add', 'ClientsController@create')->name('client_create');

Route::post('/clients/add', 'ClientsController@store')->name('client_store');

Route::get('/clients/{client}', 'ClientsController@client')->name('client-detail');

Route::get('/clients/{client}/edit', 'ClientsController@update')->name('edit');

Route::post('/clients/{client}/edit', 'ClientsController@save_client')->name('save-client');

Route::get('/clients/{client}/delete', 'ClientsController@destroy')->name('destroy');