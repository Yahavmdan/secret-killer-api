<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class checkTokenRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'userId'    => 'required|numeric',
            'token'     => 'nullable|string'
        ];
    }
}
