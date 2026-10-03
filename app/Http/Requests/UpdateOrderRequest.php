<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $orderId = $this->route('order')->order_id;

        return [
            'user_id' => 'sometimes|required|exists:users,user_id',
            'table_id' => 'sometimes|required|exists:tables,table_id',
            'order_time' => 'sometimes|required|date',
            'total_amount' => 'sometimes|required|numeric|min:0',
            'status' => 'sometimes|required|in:pending,preparing,served,completed,cancelled',
            'customer_phone' => 'sometimes|required|string|max:20',
            'customer_name' => 'sometimes|required|string|max:255',
        ];
    }
}