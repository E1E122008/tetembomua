<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PertanianController;

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

// Home Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Profile Desa Routes
Route::prefix('profile')->group(function () {
    Route::get('/sejarah', [ProfileController::class, 'sejarah'])->name('profile.sejarah');
    Route::get('/visi-misi', [ProfileController::class, 'visiMisi'])->name('profile.visi-misi');
    Route::get('/struktur', [ProfileController::class, 'struktur'])->name('profile.struktur');
    Route::get('/demografi', [ProfileController::class, 'demografi'])->name('profile.demografi');
});

// Pertanian Routes
Route::prefix('pertanian')->group(function () {
    Route::get('/', [PertanianController::class, 'index'])->name('pertanian.index');
    Route::get('/komoditas', [PertanianController::class, 'komoditas'])->name('pertanian.komoditas');
    Route::get('/teknologi', [PertanianController::class, 'teknologi'])->name('pertanian.teknologi');
    Route::get('/petani', [PertanianController::class, 'petani'])->name('pertanian.petani');
});
