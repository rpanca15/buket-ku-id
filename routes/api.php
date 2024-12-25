<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Admin\OrderController;
use App\Http\Controllers\Api\Admin\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/orders', [OrderController::class, 'index']);
    Route::post('/orders', [OrderController::class, 'store']);
    Route::get('/orders/{orderId}', [OrderController::class, 'show']);
    Route::get('/orders/{orderId}/payment', [OrderController::class, 'showPayment']);
    Route::post('/orders/{orderId}/payment', [OrderController::class, 'processPayment']);

    // Admin only routes
    Route::middleware(['role:admin'])->group(function () {
        Route::apiResource('products', ProductController::class);
    });
});