<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EquipmentResource extends JsonResource
{
    public function toArray($request)
{
    return [
        'name' => $this->name,
        'description' => $this->description,
        'daily_price' => $this->daily_price,
        'category_id' => $this->category_id,
    ];
}
}
