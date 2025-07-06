<?php

namespace webmodern\AlpacaActivityLog\Resources\Activities\Pages;

use webmodern\AlpacaActivityLog\Resources\Activities\ActivityResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListActivities extends ListRecords
{
    protected static string $resource = ActivityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
