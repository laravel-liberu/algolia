<?php

namespace LaravelEnso\Algolia\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Helpers\Casts\Encrypt;
use LaravelEnso\Rememberable\Traits\Rememberable;

class Settings extends Model
{
    use HasFactory, Rememberable;

    protected $table = 'algolia_settings';

    protected $guarded = ['id'];

    protected $casts = [
        'enabled' => 'boolean',
        'secret' => Encrypt::class,
        'app_id' => Encrypt::class,
    ];

    private static $instance;

    public static function current()
    {
        return self::$instance
            ??= self::cacheGet(1)
            ?? self::factory()->create();
    }

    public static function enabled()
    {
        return self::current()->enabled;
    }
}
