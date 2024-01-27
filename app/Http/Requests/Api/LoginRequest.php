<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email:rfc,dns'
            ],
            'password' => [
                'required'
            ]
        ];
    }
}
