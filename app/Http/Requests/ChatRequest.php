<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChatRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'message'   => 'required|string',
            'userName'  => 'required|string'
        ];
    }
}
