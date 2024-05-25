<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\ObjekRetribusiController;
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

// Route::get('/', function () {
//     return view('welcome');
// });



// Route Home Views
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/lihat-jadwal', [HomeController::class, 'jadwal'])->name('jadwal');


Route::middleware(['auth'])->group(function () {
    // Route Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Route Objek Retribusi
    Route::resource('/objek-retribusi', ObjekRetribusiController::class);

    // Route Materi
    Route::resource('/materi', MateriController::class);

    // Route Pemohon
    Route::resource('/pemohon', PemohonController::class);
});
