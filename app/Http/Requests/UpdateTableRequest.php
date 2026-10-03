<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTableRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'namber'   => 'sometimes|string|unique:tables,namber,' . $this->route('table'),
            'capacity' => 'sometimes|integer|min:1',
            'status'   => 'sometimes|in:available,occopied,reserved',
            'category' => 'sometimes|string|max:255',
        ];
    }
}
