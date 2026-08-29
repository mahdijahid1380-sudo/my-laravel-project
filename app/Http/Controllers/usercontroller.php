<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usercontroller extends Controller
{
    // تابع جدید برای نمایش پیام
    public function showHello()
    {
        return 'سلام! این پیام از داخل کنترلر یوزر می‌آید.';
    }
}
