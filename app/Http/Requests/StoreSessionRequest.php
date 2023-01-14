<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSessionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'         => 'required|string',
            'userId'       => 'required|numeric',
        ];
    }
}
