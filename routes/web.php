<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller; // اضافه کردن کنترلر در بالای صفحه

Route::get('/', function () {
    return view('welcome');
});

// وصل کردن آدرس به تابع داخل کنترلر
Route::get('/hello', [usercontroller::class, 'showHello']);
