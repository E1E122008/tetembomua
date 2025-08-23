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
    Route::get('/visi-misi', [ProfileController::class, 'visiMisi'])->name('profile.visi-misi');
    Route::get('/struktur', [ProfileController::class, 'struktur'])->name('profile.struktur');
    Route::get('/demografi', [ProfileController::class, 'demografi'])->name('profile.demografi');
});

// Pertanian Routes (only komoditas)
Route::prefix('pertanian')->group(function () {
    Route::get('/komoditas', [PertanianController::class, 'komoditas'])->name('pertanian.komoditas');
});

// News Routes
Route::get('/news', [HomeController::class, 'news'])->name('news');

// Potensi Desa Routes
Route::get('/potensi', [HomeController::class, 'potensi'])->name('potensi');

// Program Desa Routes
Route::get('/program', [HomeController::class, 'program'])->name('program');

// Galeri Routes
Route::get('/galeri', [HomeController::class, 'galeri'])->name('galeri');

// Statistik Routes
Route::get('/statistik', [HomeController::class, 'statistik'])->name('statistik');

// Admin Routes (Temporary - untuk testing)
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    Route::get('/login', function () {
        return view('admin.login');
    })->name('admin.login');
});
