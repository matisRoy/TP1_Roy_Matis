<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEquipmentRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required|string|max:40',
            'description' => 'required|string|max:255',
            'daily_price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id'
        ];
    }
}
