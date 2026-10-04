<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->menu_id, // هماهنگ با کلید اصلی شما
            'name'         => $this->name,
            'price'        => $this->price,
            'category'     => $this->category,
            'is_available' => (bool) $this->is_available,
            'created_at'   => $this->created_at->toDateString(),
            // بارگذاری آیتم‌های منو فقط در صورت Eager Loading برای جلوگیری از مشکل N+1
            'menu_items'   => MenuItemResource::collection($this->whenLoaded('menuItems')),
        ];
    }
}
