<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\TransasinonmcuController;

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

Route::get('autocomplete', [PemeriksaanController::class, 'autocomplete'])->name('autocomplete');

Route::post('mcu_import_excel', 'App\Http\Controllers\PemeriksaanController@import_excel')->name('pemeriksaanmcu.import_excel');
Route::get('pemeriksaanmcu/export_excel', 'App\Http\Controllers\PemeriksaanController@export_excel')->name('pemeriksaanmcu.export_excel');
Route::get('pemeriksaanmcu/create_import', 'App\Http\Controllers\PemeriksaanController@create_import');
Route::resource('pemeriksaanmcu', PemeriksaanController::class);

Route::post('pemeriksaannonmcu/import_excel', 'App\Http\Controllers\TransasinonmcuController@import_excel')->name('pemeriksaannonmcu.import_excel');
Route::get('pemeriksaannonmcu/export_excel', 'App\Http\Controllers\TransasinonmcuController@export_excel')->name('pemeriksaannonmcu.export_excel');
Route::resource('pemeriksaannonmcu', TransasinonmcuController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
