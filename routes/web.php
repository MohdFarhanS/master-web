<?php

use App\Http\Controllers\jsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\GaleriController as FrontendGaleriController;
use App\Http\Controllers\Frontend\DashboardInstansiController as FrontendDashboardInstansiController;

Route::prefix('js')->as('js')->group(function () {
    Route::any('/{layout}/{page}/{file}', [jsController::class, 'javaScript']);
});

// Frontend
Route::get('/', fn() => redirect()->route('frontend.dashboard-instansi.index'));
Route::get('/dashboardinstansi', [FrontendDashboardInstansiController::class, 'index'])->name('frontend.dashboard-instansi.index');
Route::get('/dashboardinstansi/{id}', [FrontendDashboardInstansiController::class, 'show'])->name('frontend.dashboard-instansi.show');
Route::get('/galeri', [FrontendGaleriController::class, 'index'])->name('frontend.galeri.index');
Route::get('/galeri{id}', [FrontendGaleriController::class, 'show'])->name('frontend.galeri.show');

// Backend
Route::get('login', 'Backend\Auth\AuthController@formLogin')->name('login');
Route::get('register', 'Backend\Auth\AuthController@formRegister')->name('register');
Route::post('sign-in', 'Backend\Auth\AuthController@login')->name('sign-in');
Route::post('sign-up', 'Backend\Auth\AuthController@register')->name('sign-up');

// Jika ingin mengakses backend nya, pada url ganti jadi /login