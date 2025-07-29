<?php

use App\Http\Controllers\jsController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

use App\Http\Controllers\Frontend\FrontendController;


Route::get('/', [FrontendController::class, 'dashboard'])->name('dashboard');
Route::get('/dashboard', [FrontendController::class, 'dashboard'])->name('dashboard.page');

// Profil Pimpinan
Route::get('/profile/pimpinan', [FrontendController::class, 'pimpinan'])->name('profile.pimpinan');
// Profil Pimpinan (Frontend)
Route::get('/profil-pimpinan', [App\Http\Controllers\Frontend\FrontendController::class, 'pimpinan'])->name('profil.pimpinan');
// Profil Instansi
Route::get('/profile/instansi', [FrontendController::class, 'instansi'])->name('profile.instansi');
// Profil Struktur
Route::get('/profile/struktur', [FrontendController::class, 'struktur'])->name('struktur');

// Berita
Route::get('/berita', [FrontendController::class, 'berita'])->name('berita');
Route::get('/berita/{id}', [FrontendController::class, 'beritaDetail'])->name('berita.detail');

// Galeri
Route::get('/galeri', [FrontendController::class, 'galeri'])->name('galeri');

// Pengumuman
Route::get('/pengumuman', [FrontendController::class, 'pengumuman'])->name('pengumuman');
Route::get('/pengumuman/{id}', [FrontendController::class, 'pengumumanDetail'])->name('pengumuman.detail');

// Kontak
Route::get('/kontak', [FrontendController::class, 'kontak'])->name('kontak');

// Route backend tetap
Route::get('login', 'Backend\Auth\AuthController@formLogin')->name('login');
Route::get('register', 'Backend\Auth\AuthController@formRegister')->name('register');
Route::post('sign-in', 'Backend\Auth\AuthController@login')->name('sign-in');
Route::post('sign-up', 'Backend\Auth\AuthController@register')->name('sign-up');
