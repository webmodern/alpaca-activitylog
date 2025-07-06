<?php

namespace webmodern\AlpacaActivityLog\Resources\Activities\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\KeyValue;

class ActivityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('log_name')
                    ->default(null),
                Textarea::make('description')
                    ->required(),
                TextInput::make('subject_type')
                    ->default(null),
                TextInput::make('event')
                    ->default(null),
                KeyValue::make('meta')
//                TextInput::make('subject_id')
//                    ->numeric()
//                    ->default(null),
//                TextInput::make('causer_type')
//                    ->default(null),
//                TextInput::make('causer_id')
//                    ->numeric()
//                    ->default(null),
                TextInput::make('batch_uuid')
                    ->default(null)
                    ->toggleable(isToggledHiddenByDefault: true),
            ]);
    }
}
