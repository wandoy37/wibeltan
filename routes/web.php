<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemohonController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PemohonController::class, 'index'])->name('index');

Route::resource('/pemohon', PemohonController::class);

Route::resource('/dashboard', DashboardController::class);
