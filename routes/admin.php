<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| O&C Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->any('/administration/*', function (Request $request) {
    if (!$request->user()->isAdmin) {
        return redirect()->route('home');   
    }

    Route::get('/administration', 'App\Http\Controllers\AdminController@displayDashboard');

    Route::get('/administration/utilisateurs/', 'App\Http\Controllers\AdminController@displayUsers');
    Route::any('/administration/utilisateurs/{id}/{?action}', 'App\Http\Controllers\AdminController@manageUser');

    Route::get('/administration/actualités/', 'App\Http\Controllers\AdminController@displayNews');
    Route::any('/administration/actualités/{id}/{?action}', 'App\Http\Controllers\AdminController@manageArticle');

    Route::get('/administration/abonnements/', 'App\Http\Controllers\AdminController@displaySubscriptions');
});