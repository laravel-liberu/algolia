<?php

namespace LaravelEnso\Algolia\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use LaravelEnso\Algolia\Models\Settings as Model;

class SettingsFactory extends Factory
{
    protected $model = Model::class;

    public function definition()
    {
        return [
            'enabled' => false,
        ];
    }
}
