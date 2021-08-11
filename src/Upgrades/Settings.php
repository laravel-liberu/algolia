<?php

namespace LaravelEnso\Algolia\Upgrades;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use LaravelEnso\Algolia\Models\Settings as Model;
use LaravelEnso\Upgrade\Contracts\MigratesData;
use LaravelEnso\Upgrade\Contracts\MigratesPostDataMigration;
use LaravelEnso\Webshop\Models\Settings as WebshopSettings;

class Settings implements MigratesData, MigratesPostDataMigration
{
    public function isMigrated(): bool
    {
        return Schema::hasTable('algolia_settings') && Model::exists();
    }

    public function migrateData(): void
    {
        $settings = WebshopSettings::first();

        (new Model())->setRawAttributes([
            'app_id' => $settings->algolia_app_id,
            'secret' => $settings->algolia_secret,
            'enabled' => (bool) $settings->algolia_enabled,
        ])->save();
    }

    public function migratePostDataMigration(): void
    {
        Schema::table('webshop_settings', function (Blueprint $table) {
            $table->dropColumn('algolia_app_id');
            $table->dropColumn('algolia_secret');
            $table->dropColumn('algolia_enabled');
        });
    }
}
