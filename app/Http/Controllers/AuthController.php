<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ۱. ثبت‌نام کاربر جدید بر اساس فیلدهای دیتابیس شما
    public function register(Request $request)
    {
        $data = $request->validate([
            'username'  => 'required|string|unique:users,username|max:255',
            'password'  => 'required|string|min:8|confirmed',
            'full_name' => 'required|string|max:255',
            'phone'     => 'required|string|max:20',
            'role'      => 'required|string|max:50',
        ]);

        $user = User::create($data);

        return response()->json([
            'user'  => $user,
            'token' => $user->createToken('api')->plainTextToken,
        ], 201);
    }

    // ۲. ورود کاربر بر اساس username و password
    public function login(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $data['username'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response()->json(['message' => 'مشخصات ورود نادرست است.'], 401);
        }

        return response()->json([
            'user'  => $user,
            'token' => $user->createToken('api')->plainTextToken,
        ]);
    }

    // ۳. خروج کاربر و حذف توکن
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->noContent();
    }
}

