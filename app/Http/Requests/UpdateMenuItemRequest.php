<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'order_id'      => 'sometimes|integer|exists:orders,order_id',
            'menu_id'       => 'sometimes|integer|exists:menu,menu_id',
            'quantity'      => 'sometimes|integer|min:1',
            'unit_price'    => 'sometimes|numeric|min:0',
            'customer_name' => 'sometimes|string|max:255',
        ];
    }
}

