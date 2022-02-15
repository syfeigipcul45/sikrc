<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\KategoriPengajarController;
use App\Http\Controllers\Dashboard\PengajarController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\ProfilController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function(){
    Route::get('/home', [DashboardController::class, 'index'])->name('beranda');

    Route::get('/management-posts', [PostController::class, 'index'])->name('dashboard.posts.index');
    Route::get('/management-posts/create', [PostController::class, 'create'])->name('dashboard.posts.create');
    Route::post('/management-posts', [PostController::class, 'store'])->name('dashboard.posts.store');
    Route::get('/management-posts/{id}/edit', [PostController::class, 'edit'])->name('dashboard.posts.edit');
    Route::get('/management-posts/{id}/show', [PostController::class, 'show'])->name('dashboard.posts.show');
    Route::post('/management-posts/{id}/update', [PostController::class, 'update'])->name('dashboard.posts.update');
    Route::post('/management-posts/{id}', [PostController::class, 'destroy'])->name('dashboard.posts.destroy');

    Route::get('/management-profil', [ProfilController::class, 'index'])->name('dashboard.profil.index');
    Route::get('/management-profil/create', [ProfilController::class, 'create'])->name('dashboard.profil.create');
    Route::post('/management-profil', [ProfilController::class, 'store'])->name('dashboard.profil.store');
    Route::get('/management-profil/{id}/edit', [ProfilController::class, 'edit'])->name('dashboard.profil.edit');
    Route::get('/management-profil/{id}/show', [ProfilController::class, 'show'])->name('dashboard.profil.show');
    Route::post('/management-profil/{id}/update', [ProfilController::class, 'update'])->name('dashboard.profil.update');
    Route::post('/management-profil/{id}', [ProfilController::class, 'destroy'])->name('dashboard.profil.destroy');
    Route::post('/management-profil/{id}/increase', [ProfilController::class, 'increase'])->name('dashboard.profil.increase');
    Route::post('/management-profil/{id}/decrease', [ProfilController::class, 'decrease'])->name('dashboard.profil.decrease');

    Route::get('/management-trainer-category', [KategoriPengajarController::class, 'index'])->name('dashboard.kategori_pengajar.index');
    Route::get('/management-trainer-category/create', [KategoriPengajarController::class, 'create'])->name('dashboard.kategori_pengajar.create');
    Route::post('/management-trainer-category', [KategoriPengajarController::class, 'store'])->name('dashboard.kategori_pengajar.store');
    Route::get('/management-trainer-category/{id}/edit', [KategoriPengajarController::class, 'edit'])->name('dashboard.kategori_pengajar.edit');
    Route::get('/management-trainer-category/{id}/show', [KategoriPengajarController::class, 'show'])->name('dashboard.kategori_pengajar.show');
    Route::post('/management-trainer-category/{id}/update', [KategoriPengajarController::class, 'update'])->name('dashboard.kategori_pengajar.update');
    Route::post('/management-trainer-category/{id}', [KategoriPengajarController::class, 'destroy'])->name('dashboard.kategori_pengajar.destroy');

    Route::get('/management-trainer', [PengajarController::class, 'index'])->name('dashboard.trainer.index');
    Route::get('/management-trainer/create', [PengajarController::class, 'create'])->name('dashboard.trainer.create');
    Route::post('/management-trainer', [PengajarController::class, 'store'])->name('dashboard.trainer.store');
    Route::get('/management-trainer/{id}/edit', [PengajarController::class, 'edit'])->name('dashboard.trainer.edit');
    Route::get('/management-trainer/{id}/show', [PengajarController::class, 'show'])->name('dashboard.trainer.show');
    Route::post('/management-trainer/{id}/update', [PengajarController::class, 'update'])->name('dashboard.trainer.update');
    Route::post('/management-trainer/{id}', [PengajarController::class, 'destroy'])->name('dashboard.trainer.destroy');
});
