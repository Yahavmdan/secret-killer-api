<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnterSessionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'userId'        => 'required|numeric',
            'sessionId'     => 'required|numeric',
        ];
    }
}
