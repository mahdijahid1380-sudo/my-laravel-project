<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TableResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'       => $this->table_id, // هماهنگ با کلید اصلی شما
            'number'   => $this->namber,   // هماهنگ با فیلد namber در دیتابیس شما
            'capacity' => (int) $this->capacity,
            'status'   => $this->status,
            'category' => $this->category,
        ];
    }
}

