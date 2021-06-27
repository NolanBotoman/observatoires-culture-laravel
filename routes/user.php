<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| O&C User Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function() {

	Route::get('/mon-compte', 'App\Http\Controllers\UserController@displayAccount')->name('account');
	Route::post('/mon-compte', 'App\Http\Controllers\UserController@updateAccount');
});