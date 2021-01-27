<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::get('/', 'McuController@index');
Route::post('mcu/import_excel', 'McuController@import_excel')->name('mcu.import_excel');
Route::get('mcu/export_excel', 'McuController@export_excel')->name('mcu.export_excel');
Route::get('mcu/create_import', 'McuController@create_import')->name('mcu.create_import');
Route::resource('mcu', 'McuController');

Route::post('nonmcu/import_excel', 'NonmcuController@import_excel')->name('nonmcu.import_excel');
Route::get('nonmcu/export_excel', 'NonmcuController@export_excel')->name('nonmcu.export_excel');
Route::resource('nonmcu', 'NonmcuController');


Route::get('/home', 'HomeController@index')->name('home');
