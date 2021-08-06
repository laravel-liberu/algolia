<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForAlgoliaSettings extends Migration
{
    protected ?string $parentMenu = 'Algolia';

    protected array $menu = [
        'name' => 'Settings', 'icon' => 'fad user-cog', 'route' => 'integrations.algolia.settings.index', 'order_index' => 200, 'has_children' => false,
    ];

    protected array $permissions = [
        ['name' => 'integrations.algolia.settings.index', 'description' => 'Show settings for Algolia', 'is_default' => false],
        ['name' => 'integrations.algolia.settings.update', 'description' => 'Update Algolia settings', 'is_default' => false],
    ];
}
