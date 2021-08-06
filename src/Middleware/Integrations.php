<?php

namespace LaravelEnso\AlgoliaWebshop\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;
use LaravelEnso\Algolia\Models\Settings;

class Integrations
{
    public function handle($request, Closure $next)
    {
        $settings = Settings::current();

        Config::set('scout.algolia.id', $settings->app_id);
        Config::set('scout.algolia.secret', $settings->secret);

        return $next($request);
    }
}
