<?php

namespace LaravelEnso\Algolia\Http\Middleware;

use Closure;
use LaravelEnso\Algolia\Models\Settings;

class Algolia
{
    public function handle($request, Closure $next)
    {
        Settings::initializeIfEnabled();

        return $next($request);
    }
}
