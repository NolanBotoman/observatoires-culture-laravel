<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| O&C Auth Routes
|--------------------------------------------------------------------------
*/

Route::post('/auth/login', 'App\Http\Controllers\AuthController@login')->name('login');

Route::post('/auth/register', 'App\Http\Controllers\AuthController@register');

Route::middleware(['auth:sanctum', 'verified'])->group(function() {
	
	Route::post('/auth/logout', 'App\Http\Controllers\AuthController@logout');
});