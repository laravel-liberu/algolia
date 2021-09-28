<?php

namespace LaravelEnso\Algolia\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateSettings extends FormRequest
{
    public function rules()
    {
        return [
            'enabled' => 'required|boolean',
        ];
    }
}
