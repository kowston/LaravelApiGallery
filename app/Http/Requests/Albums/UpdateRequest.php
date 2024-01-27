<?php

declare(strict_types=1);

namespace App\Http\Requests\Albums;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
                'image',
                'sometimes',
                'mimes:png,jpg,gif',
                'max:5120'
            ]
        ];
    }
}
