<?php

namespace LaravelLiberu\Algolia;

use Illuminate\Support\ServiceProvider;
use LaravelLiberu\Algolia\Console\Import;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->commands(Import::class);
    }
}
