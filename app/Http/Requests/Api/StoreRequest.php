<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string'
            ],
            'description' => [
                'string'
            ],
            'cover_file_path' => [
                'required',
                'image',
                'mimes:png,jpg,gif',
                'max:5120'
            ]
        ];
    }
}
