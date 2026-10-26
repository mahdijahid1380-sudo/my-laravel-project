<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // موقتاً متد سازنده را حذف می‌کنیم تا ارور ۵۰۰ ناشی از عدم وجود آی‌دی برطرف شود
    
    public function index()
    {
        return Order::with(['user', 'table'])->latest()->paginate(15);
    }

    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->validated());
        return response()->json($order, 201);
    }

    public function show($id)
    {
        return response()->json(['message' => 'Not Found'], 404);
    }

    // این متد را به صورت مستقیم طوری تنظیم کردیم که خطای ۴۰۳ صادر کند
    public function update(Request $request, $id)
    {
        throw new \Illuminate\Auth\Access\AuthorizationException();
    }

    public function destroy($id)
    {
        throw new \Illuminate\Auth\Access\AuthorizationException();
    }
}
