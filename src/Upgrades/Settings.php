<?php

namespace LaravelEnso\Algolia\Upgrades;

use Illuminate\Support\Facades\Schema;
use LaravelEnso\Upgrade\Contracts\MigratesTable;
use LaravelEnso\Upgrade\Helpers\Table;

class Settings implements MigratesTable
{
    public function isMigrated(): bool
    {
        return ! Table::hasColumn('algolia_settings', 'app_id');
    }

    public function migrateTable(): void
    {
        Schema::table('algolia_settings', function ($table) {
            $table->dropColumn('app_id');
            $table->dropColumn('secret');
        });
    }
}
