<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id'        => 'required|integer|exists:users,user_id',
            'table_id'       => 'required|integer|exists:tables,table_id',
            'order_time'     => 'required|date',
            'total_amount'   => 'required|numeric|min:0',
            'status'         => 'required|in:pending,preparing,served,completed,cancelled',
            'customer_phone' => 'required|string|max:20',
            'customer_name'  => 'required|string|max:255',
        ];
    }
}
