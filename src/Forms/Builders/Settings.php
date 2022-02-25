<?php

namespace LaravelEnso\Algolia\Forms\Builders;

use LaravelEnso\Algolia\Models\Settings as Model;
use LaravelEnso\Forms\Services\Form;

class Settings
{
    private const TemplatePath = __DIR__.'/../Templates/settings.json';

    public function __construct()
    {
        $this->form = new Form($this->templatePath());
    }

    public function edit(Model $settings)
    {
        return $this->form->edit($settings);
    }

    protected function templatePath(): string
    {
        return self::TemplatePath;
    }

}
