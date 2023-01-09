<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SessionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'         => 'required|string|unique:sessions,name',
            'userId'       => 'required|numeric',
        ];
    }
}
