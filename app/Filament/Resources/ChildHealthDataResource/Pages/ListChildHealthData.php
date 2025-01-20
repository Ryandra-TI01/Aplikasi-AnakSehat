<?php

namespace App\Filament\Resources\ChildHealthDataResource\Pages;

use App\Filament\Resources\ChildHealthDataResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListChildHealthData extends ListRecords
{
    protected static string $resource = ChildHealthDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
