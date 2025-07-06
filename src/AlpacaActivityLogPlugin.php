<?php

declare(strict_types=1);

namespace webmodern\AlpacaActivityLog;

use webmodern\AlpacaActivityLog\Resources\Activities\ActivityResource;
use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Concerns\EvaluatesClosures;

class AlpacaActivityLogPlugin implements Plugin
{
    public static function make(): static
    {
        return app(static::class);
    }

    public function getId(): string
    {
        return 'alpaca-activitylog';
    }

    public function register(Panel $panel): void
    {
        $panel->resources([
            ActivityResource::class,
        ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }
}
