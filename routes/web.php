<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;

/*
|--------------------------------------------------------------------------
| O&C Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'App\Http\Controllers\PublicController@displayDefault')->name('home');

Route::get('/qui-sommes-nous', 'App\Http\Controllers\PublicController@displayAbout');

Route::get('/actualités/{?article}', 'App\Http\Controllers\PublicController@displayNews');

Route::get('/abonnements/{?subscription}', 'App\Http\Controllers\PublicController@displaySubscriptions');

Route::get('/nous-contacter', 'App\Http\Controllers\PublicController@displayContact');
Route::post('/nous-contacter', 'App\Http\Controllers\PublicController@postContact');

require __DIR__.'/user.php';

require __DIR__.'/admin.php';
require __DIR__.'/auth.php';

Route::fallback(function () {
    return route('home');
});