<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::get('/créer-un-compte', [RegisteredUserController::class, 'create'])
                ->middleware('guest')
                ->name('register');

Route::post('/créer-un-compte', [RegisteredUserController::class, 'store'])
                ->middleware('guest');

Route::get('/se-connecter', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::post('/se-connecter', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');

Route::post('/se-déconnecter', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');
