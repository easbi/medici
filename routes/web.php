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
Route::resource('pemeriksaanmcu', PemeriksaanController::class);

Route::resource('pemeriksaannonmcu', TransasinonmcuController::class);
