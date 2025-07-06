<?php

namespace webmodern\AlpacaActivityLog\Resources\Activities\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Infolists\Components\KeyValueEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Text;
use Filament\Schemas\Components\Grid;
use Illuminate\Support\HtmlString;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Support\Enums\TextSize;
use Spatie\Activitylog\Models\Activity;
use webmodern\AlpacaActivityLog\Infolists\Components\AlpacaActivityLogEntry;

class ActivityInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(fn ($record): string => $record->log_name ?? '')
                    ->afterHeader([
                        TextEntry::make('event')
                            ->badge()
                            ->hiddenLabel()
                            ->color(fn (string $state): string => match ($state) {
                                'updated' => 'warning',
                                'created' => 'success',
                                'deleted' => 'danger',
                            })
                    ])
                    ->description(fn ($record): string => $record->description ?? '')
                    ->schema([
                        Grid::make()
                            ->columns(2)
                            ->schema([
                                TextEntry::make('subject_type')
                                    ->label('Affected Model'),
                                TextEntry::make('subject_id')
                                    ->label('Affected ID')
                                    ->numeric(),

                                TextEntry::make('causer_type')
                                    ->label('Causer Model'),
                                TextEntry::make('causer_id')
                                    ->label('Causer ID')
                                    ->numeric(),

                                TextEntry::make('created_at')
                                    ->hiddenLabel()
                                    ->dateTime(),

                                TextEntry::make('batch_uuid')
                                    ->label('Batch UUID')
                                    ->inlineLabel()
                                    ->size(TextSize::ExtraSmall),
                            ]),
                    ]),
                AlpacaActivityLogEntry::make('properties')
                    ->hiddenLabel()
            ])
            ->columns(1);
    }

    public static function outputInfoValues(object | array $record): array
    {
        var_dump($record);
    }

}
