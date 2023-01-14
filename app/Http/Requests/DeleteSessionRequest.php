<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteSessionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'sessionId' => 'required|numeric',
        ];
    }
}
