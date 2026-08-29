<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;

Route::get('/hello', [WelcomeController::class, 'hello']);
Route::get('/greet/{name}', [WelcomeController::class, 'greet']);

Route::get('/ping', function () {
    return response()->json(['pong' => true, 'time' => now()]);
});
Route::get('/team', function () {
    return 'این تغییر برای تست هم‌تیمی من است!';
});
