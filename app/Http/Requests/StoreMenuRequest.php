<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'is_available' => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Menu name is required.',
            'price.required' => 'Menu price is required.',
            'price.numeric' => 'Menu price must be a number.',
            'category.required' => 'Menu category is required.',
            'is_available.required' => 'Availability is required.',
        ];
    }
}