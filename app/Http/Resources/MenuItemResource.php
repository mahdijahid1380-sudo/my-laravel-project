<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuItemResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->menu_item_id,
            'order_id'      => $this->order_id,
            'menu_id'       => $this->menu_id,
            'quantity'      => (int) $this->quantity,
            'unit_price'    => $this->unit_price,
            'customer_name' => $this->customer_name,
        ];
    }
}
