<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| O&C User Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:sanctum', 'verified'])->group(function() {

	Route::get('/mon-compte', 'App\Http\Controllers\UserController@displayAccount');
	Route::get('/mon-compte/abonnements', 'App\Http\Controllers\UserController@displaySubscriptions');
});