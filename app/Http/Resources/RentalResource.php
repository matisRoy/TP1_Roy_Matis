<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RentalResource extends JsonResource
{
    public function toArray($request)
{
    return [
        'start_date' => $this->start_date,
        'end_date' => $this->end_date,
        'total_price' => $this->total_price,
        'user_id' => $this->user_id,
        'equipment_id' => $this->equipment_id,
    ];
}
}
