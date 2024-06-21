<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\ObjekRetribusiController;
use App\Http\Controllers\PemohonController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PublikasiController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\VideoController;
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


Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});



// Route Home Views
Route::get('/', [HomeController::class, 'index'])->name('home.index');
// Lihat Jadwal
Route::get('/lihat-jadwal', [HomeController::class, 'jadwal'])->name('jadwal');
// Lihat Materi
Route::get('/materi-wisata-belajar-pertanian', [HomeController::class, 'materi'])->name('materis');
Route::get('materi-wisata-belajar-pertanian/{slug}', [HomeController::class, 'materi_show'])->name('materis.show');

// Publikasi & Jadwal Pertanaman
Route::get('/publikasi-wisata-belajar-pertanian', [HomeController::class, 'publikasi'])->name('publikasi');
Route::get('/publikasi-wisata-belajar-pertanian/{id}', [HomeController::class, 'publikasis_show'])->name('publikasis.show');

// Form Daftar Permohonan Wisata
Route::get('/daftar', [HomeController::class, 'daftar'])->name('daftar');
Route::post('/daftar/store', [HomeController::class, 'store'])->name('daftar.store');
Route::get('/success', function () {
    return view('home/success');
})->name('success');

// Send Survey
Route::post('/survey/store', [SurveyController::class, 'store'])->name('survey.store');
// Survey Success
Route::get('/survey/success', [SurveyController::class, 'success'])->name('survey.success');


Route::middleware(['auth'])->group(function () {
    // Route Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Route Objek Retribusi
    Route::resource('/objek-retribusi', ObjekRetribusiController::class);

    // Route Materi
    Route::resource('/materi', MateriController::class);

    // Route Pemohon
    Route::resource('/pemohon', PemohonController::class);

    // Route Publikasi
    Route::resource('/publikasi', PublikasiController::class);
    // Route Photos
    Route::resource('/photos', PhotoController::class);
    // Route Tambah Photo
    Route::post('/tambah/photo/{id}', [PhotoController::class, 'tambah_photo'])->name('tambah.photo');

    // Route Videos
    Route::resource('/videos', VideoController::class);

    // Survey Index
    Route::get('/survey', [DashboardController::class, 'survey'])->name('survey.index');
});
