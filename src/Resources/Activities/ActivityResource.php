<?php

namespace webmodern\AlpacaActivityLog\Resources\Activities;

use Filament\Facades\Filament;
use webmodern\AlpacaActivityLog\AlpacaActivityLogPlugin;
use webmodern\AlpacaActivityLog\Resources\Activities\Pages\ListActivities;
use webmodern\AlpacaActivityLog\Resources\Activities\Pages\ViewActivity;
use webmodern\AlpacaActivityLog\Resources\Activities\Schemas\ActivityForm;
use webmodern\AlpacaActivityLog\Resources\Activities\Schemas\ActivityInfolist;
use webmodern\AlpacaActivityLog\Resources\Activities\Tables\ActivitiesTable;
use BackedEnum;
use Filament\Panel;
use Filament\Pages\Enums\SubNavigationPosition;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Gate;

class ActivityResource extends Resource
{
    protected static ?string $model = Activity::class;

    public static function getSlug(?Panel $panel = null): string
    {
        return (string) config('alpaca-activitylog.activitylog_resource.slug');
    }

    public static function getNavigationIcon(): string
    {
        return (string) config('alpaca-activitylog.activitylog_resource.icon', 'heroicon-o-identification');
    }

    public static function getSubNavigationPosition(): SubNavigationPosition
    {
        return config('alpaca-activitylog.activitylog_resource.sub_navigation_position', null) ?? Filament::getSubNavigationPosition();
    }

    public static function shouldRegisterNavigation(): bool
    {
        return config('alpaca-activitylog.activitylog_resource.should_register_navigation', true);
    }

    public static function getNavigationSort(): ?int
    {
        return config('alpaca-activitylog.activitylog_resource.navigation_sort');
    }

    public static function getNavigationBadge(): ?string
    {
        return config('alpaca-activitylog.activitylog_resource.navigation_badge', true)
            ? strval(static::getEloquentQuery()->count())
            : null;
    }

    public static function isScopedToTenant(): bool
    {
        return config('alpaca-activitylog.activitylog_resource.is_scoped_to_tenant', true);
    }

    public static function getNavigationGroup(): ?string
    {
        return config('alpaca-activitylog.activitylog_resource.navigation_group', true)
            ? __('alpaca-activitylog::alpaca-activitylog.nav.group')
            : '';
    }

    public static function canGloballySearch(): bool
    {
        return config('alpaca-activitylog.activitylog_resource.is_globally_searchable', false);
    }

    public static function getCluster(): ?string
    {
        return config('alpaca-activitylog.activitylog_resource.cluster', null) ?? static::$cluster;
    }

    public static function form(Schema $schema): Schema
    {
        return ActivityForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ActivityInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ActivitiesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListActivities::route('/'),
            'view' => ViewActivity::route('/{record}'),
        ];
    }

    public static function canAccess(): bool
    {
        $access = config('alpaca-activitylog.access', false);

        if ( is_bool($access) ) {
            return $access;
        }

        if ( str_starts_with($access, '@') ) {
            return str_ends_with($this->email, $access) && $this->hasVerifiedEmail();
        }

        return $this->email === $access && $this->hasVerifiedEmail();
    }
}
