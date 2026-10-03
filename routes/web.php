<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;

Route::get('/', function () {
    return 'سلام! Laravel درست اجرا شد.';
});

// Welcome
Route::get('/hello', [WelcomeController::class, 'hello']);
Route::get('/greet/{name}', [WelcomeController::class, 'greet']);

// Menu
Route::resource('menu', MenuController::class);

// Menu Items
Route::resource('menu-items', MenuItemController::class);

// Orders
Route::resource('orders', OrderController::class);

// Reservations
Route::resource('reservations', ReservationController::class);

// Tables
Route::resource('tables', TableController::class);

// Users
Route::resource('users', UserController::class);