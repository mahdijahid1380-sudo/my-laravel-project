<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'order_id'      => 'required|integer|exists:orders,order_id',
            'menu_id'       => 'required|integer|exists:menu,menu_id',
            'quantity'      => 'required|integer|min:1',
            'unit_price'    => 'required|numeric|min:0',
            'customer_name' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'order_id.required'      => 'کد سفارش الزامی است.',
            'order_id.exists'        => 'سفارش انتخاب شده وجود ندارد.',
            'menu_id.required'       => 'کد منو الزامی است.',
            'menu_id.exists'         => 'منوی انتخاب شده وجود ندارد.',
            'quantity.required'      => 'تعداد الزامی است.',
            'quantity.min'           => 'تعداد باید حداقل ۱ باشد.',
            'unit_price.required'    => 'قیمت واحد الزامی است.',
            'unit_price.min'         => 'قیمت واحد نمی‌تواند منفی باشد.',
            'customer_name.required' => 'نام مشتری الزامی است.',
        ];
    }
}
