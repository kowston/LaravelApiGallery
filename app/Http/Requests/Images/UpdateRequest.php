<?php

declare(strict_types=1);

namespace App\Http\Requests\Images;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
                'image',
                'sometimes',
                'mimes:png,jpg,gif',
                'max:5120'
            ]
            //WHAT ABOUT TAGS IN PIVOT TABLE?
        ];
    }
}
