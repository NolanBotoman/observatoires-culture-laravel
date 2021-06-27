<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::get('/créer-son-compte', [RegisteredUserController::class, 'create'])
                ->middleware('guest')
                ->name('register');

Route::post('/créer-son-compte', [RegisteredUserController::class, 'store'])
                ->middleware('guest');

Route::get('/se-connecter', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::post('/se-connecter', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');
