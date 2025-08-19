<?php

use App\Http\Controllers\jsController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\Frontend\FrontendController;

Route::prefix('js')->as('js')->group(function () {
    Route::any('/{layout}/{page}/{file}', [jsController::class, 'javaScript']);
});

Route::get('/', fn() => redirect()->route('login'));

Route::get('/', [FrontendController::class, 'dashboard'])->name('dashboard');
Route::get('/dashboard', [FrontendController::class, 'dashboard'])->name('dashboard.page');

Route::get('/profile/pimpinan', [FrontendController::class, 'pimpinan'])->name('profile.pimpinan');
Route::get('/profil-pimpinan', [FrontendController::class, 'pimpinan'])->name('profil.pimpinan');

Route::get('/profile/instansi', [FrontendController::class, 'instansi'])->name('profile.instansi');
Route::get('/profil-instansi', [FrontendController::class, 'instansi'])->name('profil.instansi');

Route::get('/profile/struktur', [FrontendController::class, 'struktur'])->name('profile.struktur');
Route::get('/struktur', [FrontendController::class, 'struktur'])->name('struktur');
Route::get('/struktur-organisasi', [FrontendController::class, 'struktur'])->name('struktur.organisasi');

Route::get('/berita', [FrontendController::class, 'berita'])->name('berita');
Route::get('/berita/{id}', [FrontendController::class, 'beritaDetail'])->name('berita.detail');

Route::get('/galeri', [FrontendController::class, 'galeri'])->name('galeri');
Route::get('/galeri/{id}', [FrontendController::class, 'galeriDetail'])->name('galeri.detail');

Route::get('/pengumuman', [FrontendController::class, 'pengumuman'])->name('pengumuman');
Route::get('/pengumuman/{id}', [FrontendController::class, 'pengumumanDetail'])->name('pengumuman.detail');
Route::get('/semua-pengumuman', [FrontendController::class, 'semuaPengumuman'])->name('pengumuman.semua');

Route::get('/kontak', [FrontendController::class, 'kontak'])->name('kontak');

Route::get('login', 'Backend\Auth\AuthController@formLogin')->name('login');
Route::get('register', 'Backend\Auth\AuthController@formRegister')->name('register');
Route::post('sign-in', 'Backend\Auth\AuthController@login')->name('sign-in');