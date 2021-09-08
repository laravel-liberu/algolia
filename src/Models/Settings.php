<?php

namespace LaravelEnso\Algolia\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use LaravelEnso\Helpers\Casts\Encrypt;
use LaravelEnso\Rememberable\Traits\Rememberable;

class Settings extends Model
{
    use HasFactory, Rememberable;

    protected $table = 'algolia_settings';

    protected $guarded = ['id'];

    protected array $rememberableKeys = ['id'];

    protected $casts = [
        'enabled' => 'boolean',
        'secret' => Encrypt::class,
        'app_id' => Encrypt::class,
    ];

    private static $instance;

    public static function current(): self
    {
        return self::$instance
            ??= self::cacheGet(1)
            ?? self::factory()->create();
    }

    public static function appId(): ?string
    {
        return self::current()->app_id;
    }

    public static function secret(): ?string
    {
        return self::current()->secret;
    }

    public static function enabled(): bool
    {
        return self::current()->enabled;
    }

    public static function initializeIfEnabled(): void
    {
        if (self::enabled()) {
            Config::set('scout.driver', 'algolia');
            Config::set('scout.algolia.id', self::appId());
            Config::set('scout.algolia.secret', self::secret());
        }
    }
}
