<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSignInRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'userName'      => 'required|string|unique:users,user_name',
            'email'         => 'required|string|email|unique:users,email',
            'password'      => 'required|string',
        ];
    }
}
