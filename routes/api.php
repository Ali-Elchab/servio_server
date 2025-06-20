<?php

use App\Http\Controllers\Api\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProviderController;
use App\Http\Controllers\Api\RatingController;
use App\Http\Controllers\Api\SubcategoryController;

Route::middleware(['verify.api.key', 'set.locale'])->group(function () {
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/subcategories', [SubcategoryController::class, 'index']);
    Route::get('/providers', [ProviderController::class, 'index']);
    Route::get('/providers/{provider}', [ProviderController::class, 'show']);
    Route::get('/providers/{provider}/ratings', [RatingController::class, 'index']);
    Route::post('/providers/{provider}/ratings', [RatingController::class, 'store']);
});
