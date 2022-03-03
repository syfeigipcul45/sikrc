<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\FasilitasController;
use App\Http\Controllers\Dashboard\HeroImageController;
use App\Http\Controllers\Dashboard\JadwalPelatihanController;
use App\Http\Controllers\Dashboard\KategoriPengajarController;
use App\Http\Controllers\Dashboard\MateriPelatihanController;
use App\Http\Controllers\Dashboard\MediaGalleriesController;
use App\Http\Controllers\Dashboard\OptionController;
use App\Http\Controllers\Dashboard\PengajarController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\ProfilController;
use App\Http\Controllers\Dashboard\TemaPelatihanController;
use App\Http\Controllers\Homepage\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// homepage
Route::get('/', [HomeController::class, 'index'])->name('home');
// profil
Route::get('/profil/{slug}', [HomeController::class, 'getProfil'])->name('homepage.profil.detail');
// posts
Route::get('/berita/', [HomeController::class, 'getPosts'])->name('homepage.post.post');
Route::get('/berita/{slug}', [HomeController::class, 'getDetailPost'])->name('homepage.post.detail');
// pengajar
Route::get('/pengajar', [HomeController::class, 'getPengajar'])->name('homepage.pengajar.index');
// posts
Route::get('/fasilitas/', [HomeController::class, 'getFasilitas'])->name('homepage.fasilitas.index');
Route::get('/fasilitas/{slug}', [HomeController::class, 'getDetailFasilitas'])->name('homepage.fasilitas.detail');
// pelatihan
Route::get('/pelatihan/jadwal-pelatihan', [HomeController::class, 'getJadwalPelatihan'])->name('homepage.pelatihan.jadwal_pelatihan');
Route::get('/pelatihan/materi-pelatihan', [HomeController::class, 'getTemaPelatihan'])->name('homepage.pelatihan.materi_pelatihan');
Route::get('/pelatihan/materi-pelatihan/{slug}', [HomeController::class, 'getMateriPelatihan'])->name('homepage.pelatihan.show_materi');
// media
Route::get('/media/galeri-foto', [HomeController::class, 'getPhoto'])->name('homepage.media.photo');
Route::get('/media/galeri-foto/detail', [HomeController::class, 'getDetailPhoto'])->name('homepage.media.photo_detail');
Route::get('/media/galeri-video', [HomeController::class, 'getVideo'])->name('homepage.media.video');
// kontak
Route::get('/kontak', [HomeController::class, 'getKontak'])->name('homepage.kontak.index');
Route::post('/kontak', [HomeController::class, 'storeKontak'])->name('homepage.kontak.store');

// dashboard
Route::group(['middleware' => ['auth']], function () {
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

    Route::get('/management-instructur-category', [KategoriPengajarController::class, 'index'])->name('dashboard.kategori_pengajar.index');
    Route::get('/management-instructur-category/create', [KategoriPengajarController::class, 'create'])->name('dashboard.kategori_pengajar.create');
    Route::post('/management-instructur-category', [KategoriPengajarController::class, 'store'])->name('dashboard.kategori_pengajar.store');
    Route::get('/management-instructur-category/{id}/edit', [KategoriPengajarController::class, 'edit'])->name('dashboard.kategori_pengajar.edit');
    Route::get('/management-instructur-category/{id}/show', [KategoriPengajarController::class, 'show'])->name('dashboard.kategori_pengajar.show');
    Route::post('/management-instructur-category/{id}/update', [KategoriPengajarController::class, 'update'])->name('dashboard.kategori_pengajar.update');
    Route::post('/management-instructur-category/{id}', [KategoriPengajarController::class, 'destroy'])->name('dashboard.kategori_pengajar.destroy');

    Route::get('/management-instructur', [PengajarController::class, 'index'])->name('dashboard.instructur.index');
    Route::get('/management-instructur/create', [PengajarController::class, 'create'])->name('dashboard.instructur.create');
    Route::post('/management-instructur', [PengajarController::class, 'store'])->name('dashboard.instructur.store');
    Route::get('/management-instructur/{id}/edit', [PengajarController::class, 'edit'])->name('dashboard.instructur.edit');
    Route::get('/management-instructur/{id}/show', [PengajarController::class, 'show'])->name('dashboard.instructur.show');
    Route::post('/management-instructur/{id}/update', [PengajarController::class, 'update'])->name('dashboard.instructur.update');
    Route::post('/management-instructur/{id}', [PengajarController::class, 'destroy'])->name('dashboard.instructur.destroy');

    Route::get('/management-facility', [FasilitasController::class, 'index'])->name('dashboard.fasilitas.index');
    Route::get('/management-facility/create', [FasilitasController::class, 'create'])->name('dashboard.fasilitas.create');
    Route::post('/management-facility', [FasilitasController::class, 'store'])->name('dashboard.fasilitas.store');
    Route::get('/management-facility/{id}/edit', [FasilitasController::class, 'edit'])->name('dashboard.fasilitas.edit');
    Route::get('/management-facility/{id}/show', [FasilitasController::class, 'show'])->name('dashboard.fasilitas.show');
    Route::post('/management-facility/{id}/update', [FasilitasController::class, 'update'])->name('dashboard.fasilitas.update');
    Route::post('/management-facility/{id}', [FasilitasController::class, 'destroy'])->name('dashboard.fasilitas.destroy');

    Route::prefix('management-training')->group(function () {
        Route::get('/tema', [TemaPelatihanController::class, 'index'])->name('dashboard.tema_pelatihan.index');
        Route::get('/tema/create', [TemaPelatihanController::class, 'create'])->name('dashboard.tema_pelatihan.create');
        Route::post('/tema', [TemaPelatihanController::class, 'store'])->name('dashboard.tema_pelatihan.store');
        Route::get('/tema/{id}/edit', [TemaPelatihanController::class, 'edit'])->name('dashboard.tema_pelatihan.edit');
        Route::get('/tema/{id}/show', [TemaPelatihanController::class, 'show'])->name('dashboard.tema_pelatihan.show');
        Route::post('/tema/{id}/update', [TemaPelatihanController::class, 'update'])->name('dashboard.tema_pelatihan.update');
        Route::post('/tema/{id}', [TemaPelatihanController::class, 'destroy'])->name('dashboard.tema_pelatihan.destroy');

        Route::get('/jadwal', [JadwalPelatihanController::class, 'index'])->name('dashboard.jadwal_pelatihan.index');
        Route::get('/jadwal/create', [JadwalPelatihanController::class, 'create'])->name('dashboard.jadwal_pelatihan.create');
        Route::post('/jadwal', [JadwalPelatihanController::class, 'store'])->name('dashboard.jadwal_pelatihan.store');
        Route::get('/jadwal/{id}/edit', [JadwalPelatihanController::class, 'edit'])->name('dashboard.jadwal_pelatihan.edit');
        Route::get('/jadwal/{id}/show', [JadwalPelatihanController::class, 'show'])->name('dashboard.jadwal_pelatihan.show');
        Route::post('/jadwal/{id}/update', [JadwalPelatihanController::class, 'update'])->name('dashboard.jadwal_pelatihan.update');
        Route::post('/jadwal/{id}', [JadwalPelatihanController::class, 'destroy'])->name('dashboard.jadwal_pelatihan.destroy');

        Route::get('/materi', [MateriPelatihanController::class, 'index'])->name('dashboard.materi_pelatihan.index');
        Route::get('/materi/{id}/show', [MateriPelatihanController::class, 'show'])->name('dashboard.materi_pelatihan.show');

        Route::get('/materi/{id}/createPresentasi', [MateriPelatihanController::class, 'createPresentasi'])->name('dashboard.materi_pelatihan.createPresentasi');
        Route::post('/materiPresentasi', [MateriPelatihanController::class, 'storePresentasi'])->name('dashboard.materi_pelatihan.storePresentasi');
        Route::get('/materi/{id}/editPresentasi', [MateriPelatihanController::class, 'editPresentasi'])->name('dashboard.materi_pelatihan.editPresentasi');
        Route::post('/materi/{id}/updatePresentasi', [MateriPelatihanController::class, 'updatePresentasi'])->name('dashboard.materi_pelatihan.updatePresentasi');
        Route::post('/materiPresentasi/{id}', [MateriPelatihanController::class, 'destroyPresentasi'])->name('dashboard.materi_pelatihan.destroyPresentasi');

        Route::get('/materi/{id}/createGambar', [MateriPelatihanController::class, 'createGambar'])->name('dashboard.materi_pelatihan.createGambar');
        Route::post('/materiGambar', [MateriPelatihanController::class, 'storeGambar'])->name('dashboard.materi_pelatihan.storeGambar');
        Route::get('/materi/{id}/editGambar', [MateriPelatihanController::class, 'editGambar'])->name('dashboard.materi_pelatihan.editGambar');
        Route::post('/materi/{id}/updateGambar', [MateriPelatihanController::class, 'updateGambar'])->name('dashboard.materi_pelatihan.updateGambar');
        Route::post('/materiGambar/{id}', [MateriPelatihanController::class, 'destroyGambar'])->name('dashboard.materi_pelatihan.destroyGambar');

        Route::get('/materi/{id}/createVideo', [MateriPelatihanController::class, 'createVideo'])->name('dashboard.materi_pelatihan.createVideo');
        Route::post('/materiVideo', [MateriPelatihanController::class, 'storeVideo'])->name('dashboard.materi_pelatihan.storeVideo');
        Route::get('/materi/{id}/editVideo', [MateriPelatihanController::class, 'editVideo'])->name('dashboard.materi_pelatihan.editVideo');
        Route::post('/materi/{id}/updateVideo', [MateriPelatihanController::class, 'updateVideo'])->name('dashboard.materi_pelatihan.updateVideo');
        Route::post('/materiVideo/{id}', [MateriPelatihanController::class, 'destroyVideo'])->name('dashboard.materi_pelatihan.destroyVideo');
    });

    Route::prefix('management-media')->group(function () {
        Route::get('/photo', [MediaGalleriesController::class, 'indexPhoto'])->name('dashboard.media_photo.index');
        Route::get('/photo/create', [MediaGalleriesController::class, 'createPhoto'])->name('dashboard.media_photo.create');
        Route::post('/photo', [MediaGalleriesController::class, 'storePhoto'])->name('dashboard.media_photo.store');
        Route::get('/photo/{id}/edit', [MediaGalleriesController::class, 'editPhoto'])->name('dashboard.media_photo.edit');
        Route::get('/photo/{id}/show', [MediaGalleriesController::class, 'showPhoto'])->name('dashboard.media_photo.show');
        Route::post('/photo/{id}/update', [MediaGalleriesController::class, 'updatePhoto'])->name('dashboard.media_photo.update');
        Route::post('/photo/{id}', [MediaGalleriesController::class, 'destroyPhoto'])->name('dashboard.media_photo.destroy');

        Route::get('/video', [MediaGalleriesController::class, 'indexVideo'])->name('dashboard.media_video.index');
        Route::get('/video/create', [MediaGalleriesController::class, 'createVideo'])->name('dashboard.media_video.create');
        Route::post('/video', [MediaGalleriesController::class, 'storeVideo'])->name('dashboard.media_video.store');
        Route::get('/video/{id}/edit', [MediaGalleriesController::class, 'editVideo'])->name('dashboard.media_video.edit');
        Route::post('/video/{id}/update', [MediaGalleriesController::class, 'updateVideo'])->name('dashboard.media_video.update');
        Route::post('/video/{id}', [MediaGalleriesController::class, 'destroyVideo'])->name('dashboard.media_video.destroy');
    });

    Route::get('/management-settings', [OptionController::class, 'index'])->name('dashboard.settings.index');
    Route::post('/management-settings', [OptionController::class, 'store'])->name('dashboard.settings.store');

    Route::get('/management-images', [HeroImageController::class, 'index'])->name('dashboard.hero_images.index');
    Route::get('/management-images/create', [HeroImageController::class, 'create'])->name('dashboard.hero_images.create');
    Route::post('/management-images', [HeroImageController::class, 'store'])->name('dashboard.hero_images.store');
    Route::get('/management-images/{id}/edit', [HeroImageController::class, 'edit'])->name('dashboard.hero_images.edit');
    Route::post('/management-images/{id}/update', [HeroImageController::class, 'update'])->name('dashboard.hero_images.update');
    Route::post('/management-images/{id}', [HeroImageController::class, 'destroy'])->name('dashboard.hero_images.destroy');
});
