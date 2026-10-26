<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;

class OrderPolicy
{
    /**
     * مشخص می‌کند آیا کاربر می‌تواند سفارش را ویرایش کند یا خیر.
     */
    public function update(User $user, Order $order): bool
    {
        // دسترسی فقط در صورتی مجاز است که سفارش متعلق به خود کاربر لاگین شده باشد
        return $user->user_id === $order->user_id;
    }

    /**
     * مشخص می‌کند آیا کاربر می‌تواند سفارش را حذف کند یا خیر.
     */
    public function delete(User $user, Order $order): bool
    {
        return $user->user_id === $order->user_id;
    }
}
