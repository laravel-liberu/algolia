<?php

namespace LaravelEnso\Algolia;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use LaravelEnso\Algolia\Models\Settings;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        if (Settings::enabled()) {
            Config::set('scout.driver', 'algolia');
            Config::set('scout.algolia.id', Settings::appId());
            Config::set('scout.algolia.secret', Settings::secret());
        }
    }
}
