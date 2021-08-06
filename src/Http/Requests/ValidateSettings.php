<?php

namespace LaravelEnso\Algolia\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateSettings extends FormRequest
{
    public function rules()
    {
        return [
            'app_id' => 'nullable|string|max:255',
            'enabled' => 'required|boolean',
            'secret' => 'nullable|string|max:255',
        ];
    }
}
