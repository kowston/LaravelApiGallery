<?php

declare(strict_types=1);

namespace App\Http\Requests\Tags;

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
            'tag_id' => [
                'integer'
            ]
        ];
    }
}
