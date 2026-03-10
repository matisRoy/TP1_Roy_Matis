<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'rating'    => 'required|integer|min:0|max:5',
            'comment'   => 'required|string|max:50',
            'user_id'   => 'required|exists:users,id',
            'rental_id' => 'required|exists:rentals,id'
        ];
    }
}
