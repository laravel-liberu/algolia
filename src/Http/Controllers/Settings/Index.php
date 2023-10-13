<?php

namespace LaravelLiberu\Algolia\Http\Controllers\Settings;

use Illuminate\Routing\Controller;
use LaravelLiberu\Algolia\Forms\Builders\Settings as Form;
use LaravelLiberu\Algolia\Models\Settings;

class Index extends Controller
{
    public function __invoke(Form $form)
    {
        return ['form' => $form->edit(Settings::current())];
    }
}
