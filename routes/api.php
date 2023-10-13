<?php

use Illuminate\Support\Facades\Route;
use LaravelLiberu\Algolia\Http\Controllers\Settings\Index;
use LaravelLiberu\Algolia\Http\Controllers\Settings\Update;

Route::middleware(['api', 'auth', 'core'])
    ->prefix('api/integrations/algolia/settings')
    ->as('integrations.algolia.settings.')
    ->group(function () {
        Route::get('', Index::class)->name('index');
        Route::patch('{settings}', Update::class)->name('update');
    });
