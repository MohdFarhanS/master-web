<?php
use Illuminate\Support\Facades\Route;
Route::group(['prefix'=>config('mvc.route_prefix')], function () { // remove this line if you dont have route group prefix
    Route::group(['middleware'=>['userRoles']], function () {
		//profile-instansi
		Route::prefix('profile-instansi')->as('profile-instansi')->group(function () {
			Route::get('data', 'ProfileInstansi\ProfileInstansiController@data');
			Route::get('delete/{id}', 'ProfileInstansi\ProfileInstansiController@delete');
		});
		Route::resource('profile-instansi', 'ProfileInstansi\ProfileInstansiController');
		//end-profile-instansi
		//profile-pimpinan
		Route::prefix('profile-pimpinan')->as('profile-pimpinan')->group(function () {
			Route::get('data', 'ProfilePimpinan\ProfilePimpinanController@data');
			Route::get('delete/{id}', 'ProfilePimpinan\ProfilePimpinanController@delete');
		});
		Route::resource('profile-pimpinan', 'ProfilePimpinan\ProfilePimpinanController');
		//end-profile-pimpinan
		//dashboard-instansi
		Route::prefix('dashboard-instansi')->as('dashboard-instansi')->group(function () {
			Route::get('data', 'DashboardInstansi\DashboardInstansiController@data');
			Route::get('delete/{id}', 'DashboardInstansi\DashboardInstansiController@delete');
		});
		Route::resource('dashboard-instansi', 'DashboardInstansi\DashboardInstansiController');
		//end-dashboard-instansi
		//berita
		Route::prefix('berita')->as('berita')->group(function () {
			Route::get('data', 'Berita\BeritaController@data');
			Route::get('delete/{id}', 'Berita\BeritaController@delete');
		});
		Route::resource('berita', 'Berita\BeritaController');
		//end-berita
		//galeri
		Route::prefix('galeri')->as('galeri')->group(function () {
			Route::get('data', 'Galeri\GaleriController@data');
			Route::get('delete/{id}', 'Galeri\GaleriController@delete');
		});
		Route::resource('galeri', 'Galeri\GaleriController');
		//end-galeri
		//pengumuman
		Route::prefix('pengumuman')->as('pengumuman')->group(function () {
			Route::get('data', 'Pengumuman\PengumumanController@data');
			Route::get('delete/{id}', 'Pengumuman\PengumumanController@delete');
		});
		Route::resource('pengumuman', 'Pengumuman\PengumumanController');
		//end-pengumuman
		//{{route replacer}} DON'T REMOVE THIS LINE
    });
});
