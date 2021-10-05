<?php

namespace LaravelEnso\Algolia\Console;

use Algolia\ScoutExtended\Facades\Algolia;
use Illuminate\Console\Command;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Laravel\Scout\Events\ModelsImported;

class Import extends Command
{
    protected $signature = 'enso:algolia:import
            {model : Class name of model to bulk import}
            {--c|chunk= : The number of records to import at a time (Defaults to configuration value: `scout.chunk.searchable`)}';

    protected $description = 'Import the given model into the search index';

    public function handle(Dispatcher $events)
    {
        $events->listen(ModelsImported::class, fn () => $this->updateSettings());

        $this->call('scout:import', [
            'searchable' => $this->argument('model'),
        ]);

        $events->forget(ModelsImported::class);
    }

    private function updateSettings(): void
    {
        $searchable = App::make($this->argument('model'))::class;
        $index = Algolia::index($searchable);
        $settings = $index->getSettings();

        $facets = Collection::wrap($searchable::filterableAttributes())
            ->map(fn ($attribute) => "searchable({$attribute})");

        $settings['attributesForFaceting'] = $facets;
        $settings['searchableAttributes'] = $searchable::searchableAttributes();

        $index->setSettings($settings);

        $this->output->success('Settings for index were successfully updated');
    }
}
