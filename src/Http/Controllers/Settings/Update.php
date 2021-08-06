<?php

namespace LaravelEnso\Algolia\Http\Controllers\Settings;

use Illuminate\Routing\Controller;
use LaravelEnso\Algolia\Http\Requests\ValidateSettings;
use LaravelEnso\Algolia\Models\Settings;

class Update extends Controller
{
    public function __invoke(ValidateSettings $request, Settings $settings)
    {
        $settings->update($request->validated());

        return ['message' => 'Settings were stored sucessfully'];
    }
}
