<?php

namespace webmodern\AlpacaActivityLog\Resources\Activities\Pages;

use webmodern\AlpacaActivityLog\Resources\Activities\ActivityResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewActivity extends ViewRecord
{
    protected static string $resource = ActivityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
