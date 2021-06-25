<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| O&C Contact Routes
|--------------------------------------------------------------------------
*/

Route::get('/nous-contacter', 'App\Http\Controllers\ContactController@displayContact');

Route::post('/nous-contacter', 'App\Http\Controllers\ContactController@postContact');