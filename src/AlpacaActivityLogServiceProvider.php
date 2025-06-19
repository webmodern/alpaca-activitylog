<?php

namespace webmodern\AlpacaActivityLog;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AlpacaActivityLogServiceProvider extends PackageServiceProvider
{
    public static string $name = 'alpaca-activitylog';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
//            ->hasViews()
            ->hasTranslations();
    }
}
