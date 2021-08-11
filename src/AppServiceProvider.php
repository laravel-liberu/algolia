<?php

namespace LaravelEnso\Algolia;

use Illuminate\Support\ServiceProvider;
use LaravelEnso\Algolia\Http\Middleware\Integrations;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    public function register()
    {
        $this->app['router']
            ->aliasMiddleware('integrations', Integrations::class);
    }
}
