<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\APIController;
use App\Http\Controllers\Api\APIAuthController;

/*
|--------------------------------------------------------------------------
| O&C API Routes
|--------------------------------------------------------------------------
*/

Route::post("/contact", [APIController::class,"sendContact"]);

Route::get("/posts", [APIController::class,"getAll"]);
Route::get("/posts/{id}", [APIController::class,"getById"]);

Route::get("/plans", [APIController::class,"getPlans"]);

Route::middleware(['auth:sanctum', 'verified'])->group(function() {

    Route::post("/subscriptions", [APIController::class,"subscribe"]);
    Route::post('/auth/login', [APIAuthController::class,"login"])->name('login');
    Route::post('/auth/register', [APIAuthController::class,"register"]);
    Route::post('/auth/me', [APIAuthController::class,"getCurrentUserData"]);
    Route::post('/auth/logout', [APIAuthController::class,"logout"]);
});

Route::fallback(function () {
    return response()->json([
        'message' => 'Bad request.'
    ], 404);
});
