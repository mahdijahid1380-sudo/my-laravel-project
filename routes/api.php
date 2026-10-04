<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;

// تمام روت‌های پروژه تحت پیشوند v1 گروه‌بندی شدند
Route::prefix('v1')->group(function () {

    Route::apiResource('menu', MenuController::class);

    Route::apiResource('menu-items', MenuItemController::class);

    Route::apiResource('orders', OrderController::class);

    Route::apiResource('reservations', ReservationController::class);

    Route::apiResource('tables', TableController::class);

    Route::apiResource('users', UserController::class);

});
