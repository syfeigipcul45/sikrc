<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\PostController;
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
});
