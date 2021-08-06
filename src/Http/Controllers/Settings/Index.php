<?php

namespace LaravelEnso\Algolia\Http\Controllers\Settings;

use Illuminate\Routing\Controller;
use LaravelEnso\Algolia\Forms\Builders\Settings as Form;
use LaravelEnso\Algolia\Models\Settings;

class Index extends Controller
{
    public function __invoke(Form $form)
    {
        return ['form' => $form->edit(Settings::current())];
    }
}
