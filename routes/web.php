<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenPaController;
use App\Http\Controllers\MahasiswaHomeController;
use App\Http\Controllers\DosenPaHomeController;

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

Route::get('/', [Controller::class, 'home']);
Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('mahasiswaHome', MahasiswaHomeController::class);
Route::resource('dosenpa', DosenPaController::class);
Route::resource('dosenpaHome', DosenPaHomeController::class);
