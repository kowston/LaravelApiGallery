<?php

declare(strict_types=1);

namespace App\Http\Requests\Images;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

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
            'image_file_path' => [
                'required',
                'image',
                'mimes:png,jpg,gif',
                'max:5120'
            ],
            'album_id' => [
                'required',
                'integer'
            ]
        ];
    }
}
