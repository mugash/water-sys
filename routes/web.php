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

Route::get('/readings', 'MeterReadingController@index')->name('meter_reading_list');

Route::get('/readings/create', 'MeterReadingController@create')->name('meter_reading_add');

Route::post('/readings/create', 'MeterReadingController@store')->name('meter_reading_store');

Route::get('/readings/{reading}', 'MeterReadingController@reading')->name('meter_reading');

Route::get('/readings/meter/{meter_number}', 'MeterReadingController@readings_by_meter_number')->name('meter_reading_by_meter');

Route::post('/readings/meter', 'MeterReadingController@readings_by_meter_number_via_form')->name('meter_reading_by_meter_by_form');

Route::get('/readings/{reading}/edit', 'MeterReadingController@edit')->name('meter_reading_edit');


