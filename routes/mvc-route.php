<?php
use Illuminate\Support\Facades\Route;
Route::group(['prefix'=>config('mvc.route_prefix')], function () { // remove this line if you dont have route group prefix
    Route::group(['middleware'=>['userRoles']], function () {
		//profile-pimpinan
		Route::prefix('profile-pimpinan')->as('profile-pimpinan')->group(function () {
			Route::get('data', 'ProfilePimpinan\ProfilePimpinanController@data');
			Route::get('delete/{id}', 'ProfilePimpinan\ProfilePimpinanController@delete');
		});
		Route::resource('profile-pimpinan', 'ProfilePimpinan\ProfilePimpinanController');
		//end-profile-pimpinan
		//galeri
		Route::prefix('galeri')->as('galeri')->group(function () {
			Route::get('data', 'Galeri\GaleriController@data');
			Route::get('delete/{id}', 'Galeri\GaleriController@delete');
		});
		Route::resource('galeri', 'Galeri\GaleriController');
		//end-galeri
		//{{route replacer}} DON'T REMOVE THIS LINE
    });
});
