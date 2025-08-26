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

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/login', function () {
        return view('admin.login');
    })->name('admin.login');
    
    // News Management
    Route::get('/news', [App\Http\Controllers\AdminController::class, 'news'])->name('admin.news');
    Route::get('/news/create', [App\Http\Controllers\AdminController::class, 'createNews'])->name('admin.news.create');
    Route::post('/news', [App\Http\Controllers\AdminController::class, 'storeNews'])->name('admin.news.store');
    
    // Population Data Management
    Route::get('/population', [App\Http\Controllers\AdminController::class, 'population'])->name('admin.population');
    Route::post('/population', [App\Http\Controllers\AdminController::class, 'updatePopulation'])->name('admin.population.update');
    
    // Agricultural Data Management
    Route::get('/agricultural', [App\Http\Controllers\AdminController::class, 'agricultural'])->name('admin.agricultural');
    Route::post('/agricultural', [App\Http\Controllers\AdminController::class, 'updateAgricultural'])->name('admin.agricultural.update');
    
    // User Management
    Route::get('/users', [App\Http\Controllers\AdminController::class, 'users'])->name('admin.users');
    Route::get('/users/create', [App\Http\Controllers\AdminController::class, 'createUser'])->name('admin.users.create');
    Route::post('/users', [App\Http\Controllers\AdminController::class, 'storeUser'])->name('admin.users.store');
    
    // Settings Management
    Route::get('/settings', [App\Http\Controllers\AdminController::class, 'settings'])->name('admin.settings');
    Route::post('/settings', [App\Http\Controllers\AdminController::class, 'updateSettings'])->name('admin.settings.update');
    
                  // Gallery Management
              Route::get('/gallery', [App\Http\Controllers\AdminController::class, 'gallery'])->name('admin.gallery');
              Route::post('/gallery/upload', [App\Http\Controllers\AdminController::class, 'uploadGallery'])->name('admin.gallery.upload');
              Route::put('/gallery/{filename}/edit', [App\Http\Controllers\AdminController::class, 'editGalleryImage'])->name('admin.gallery.edit');
              Route::delete('/gallery/{filename}', [App\Http\Controllers\AdminController::class, 'deleteGalleryImage'])->name('admin.gallery.delete');

    // Struktur Organisasi Management
    Route::get('/structure', [App\Http\Controllers\AdminController::class, 'structure'])->name('admin.structure');
    Route::post('/structure', [App\Http\Controllers\AdminController::class, 'updateStructure'])->name('admin.structure.update');
    Route::post('/structure/kades', [App\Http\Controllers\AdminController::class, 'updateKades'])->name('admin.structure.kades.update');
    Route::post('/structure/entry', [App\Http\Controllers\AdminController::class, 'storeStructureEntry'])->name('admin.structure.entry.store');
    Route::post('/structure/entry/{id}', [App\Http\Controllers\AdminController::class, 'updateStructureEntry'])->name('admin.structure.entry.update');
    Route::delete('/structure/entry/{id}', [App\Http\Controllers\AdminController::class, 'deleteStructureEntry'])->name('admin.structure.entry.delete');
});
