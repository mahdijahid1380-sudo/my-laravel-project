<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTableRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'namber'   => 'required|string|unique:tables,namber',
            'capacity' => 'required|integer|min:1',
            'status'   => 'required|in:available,occopied,reserved',
            'category' => 'required|string|max:255',
        ];
    }
}
