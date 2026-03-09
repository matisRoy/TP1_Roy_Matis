<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'rating' => $this->rating,
            'comment' => $this->comment,
            'user_id' => $this->user_id,
            'rental_id' => $this->rental_id,
        ];
    }
}
