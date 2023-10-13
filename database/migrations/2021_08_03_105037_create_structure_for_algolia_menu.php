<?php

use LaravelLiberu\Migrator\Database\Migration;

class CreateStructureForAlgoliaMenu extends Migration
{
    protected array $menu = [
        'name' => 'Algolia', 'icon' => 'fab algolia', 'route' => null, 'order_index' => 100, 'has_children' => true,
    ];

    protected ?string $parentMenu = 'Integrations';
}
