<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:20',
            'last_name'  => 'required|string|max:20',
            'email'      => 'required|email|max:40|unique:users,email',
            'phone'      => 'required|string|max:10|unique:users,phone'
        ];
    }
}
