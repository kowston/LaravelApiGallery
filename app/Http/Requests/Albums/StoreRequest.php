<?php

declare(strict_types=1);

namespace App\Http\Requests\Albums;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required'
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
