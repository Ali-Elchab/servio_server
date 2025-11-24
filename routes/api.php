<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\ProviderController;
use App\Http\Controllers\Api\RatingController;
use App\Http\Controllers\Api\LocationController;

Route::middleware(['verify.api.key', 'set.locale'])->group(function () {

    // Public (no auth)
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/{category}', [CategoryController::class, 'show']);
    Route::get('/categories/{category}/children', [CategoryController::class, 'children']);
    Route::get('/subcategories', [CategoryController::class, 'children']); // backward compatible alias
    Route::get('/providers', [ProviderController::class, 'index']);
    Route::get('/providers/{provider}', [ProviderController::class, 'show']);
    Route::get('/providers/{provider}/ratings', [RatingController::class, 'index']);

    // Auth (login/register)
    Route::prefix('auth')->group(function () {
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/login', [AuthController::class, 'login']);

        Route::middleware('auth:sanctum')->group(function () {
            Route::post('/logout', [AuthController::class, 'logout']);
            Route::delete('/delete', [AuthController::class, 'deleteAccount']);
        });
    });

    // Authenticated user provider routes
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/providers', [ProviderController::class, 'store']);
        Route::put('/providers/{provider}', [ProviderController::class, 'update']);
        Route::delete('/providers/{provider}', [ProviderController::class, 'destroy']);
        Route::get('/providers/me', [ProviderController::class, 'myProfile']);
        Route::get('/providers/me/stats', [ProviderController::class, 'getStats']);
    });

    // Location
    Route::get('/cities', [LocationController::class, 'cities']);
    Route::get('/cities/{city}/areas', [LocationController::class, 'areas']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/favorites', [FavoriteController::class, 'index']);
        Route::post('/favorites/{provider}', [FavoriteController::class, 'toggle']);
    });
});
