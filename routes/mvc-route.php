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
		//{{route replacer}} DON'T REMOVE THIS LINE
    });
});
