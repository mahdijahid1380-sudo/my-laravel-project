<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;

Route::prefix('v1')->group(function () {

    // ۱. مسیرهای عمومی (بدون نیاز به توکن)
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login',    [AuthController::class, 'login']);

    // ۲. مسیرهای محافظت‌شده (نیاز به Bearer Token)
    Route::middleware('auth:sanctum')->group(function () {
        
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/me', fn (Illuminate\Http\Request $request) => $request->user());

        // روت‌های اصلی پروژه شما
        Route::apiResource('menu', MenuController::class);
        Route::apiResource('menu-items', MenuItemController::class);
        Route::apiResource('orders', OrderController::class);
        Route::apiResource('reservations', ReservationController::class);
        Route::apiResource('tables', TableController::class);
        Route::apiResource('users', UserController::class);
    });
  Route::put('/test-auth-error', function() {
    throw new \Illuminate\Auth\Access\AuthorizationException();
});

});
