<?php

namespace webmodern\AlpacaActivityLog\Resources\Activities\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Grouping\Group;
use Spatie\Activitylog\Models\Activity;

class ActivitiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('log_name')
                    ->searchable(),
                TextColumn::make('description')
                    ->searchable()
                    ->wrap()
                    ->lineClamp(2)
                    ->placeholder('No description'),
//                TextColumn::make('subject_type')
//                    ->searchable(),
//                TextColumn::make('subject_id')
//                    ->numeric()
//                    ->sortable(),
//                TextColumn::make('causer_type')
//                    ->searchable(),
//                TextColumn::make('causer_id')
//                    ->numeric()
//                    ->sortable(),
                TextColumn::make('batch_uuid')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('event')
                          ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('updated_at')
                    ->dateTime()
//                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', direction: 'desc')
            ->filters([
                //
            ])
            ->recordActions([
//                ViewAction::make(),
            ])
            ->toolbarActions([
                //
            ]);
    }
}
