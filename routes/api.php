<?php

use Illuminate\Support\Facades\Route;
use LaravelEnso\Algolia\Http\Controllers\Settings\Index;
use LaravelEnso\Algolia\Http\Controllers\Settings\Update;

Route::middleware(['api', 'auth', 'core'])
    ->prefix('api/integrations/algolia/settings')
    ->as('integrations.algolia.settings.')
    ->group(function () {
        Route::get('', Index::class)->name('index');
        Route::patch('{settings}', Update::class)->name('update');
    });
