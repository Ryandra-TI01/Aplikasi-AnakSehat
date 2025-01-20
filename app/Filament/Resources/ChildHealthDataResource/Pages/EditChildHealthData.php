<?php

namespace App\Filament\Resources\ChildHealthDataResource\Pages;

use App\Filament\Resources\ChildHealthDataResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditChildHealthData extends EditRecord
{
    protected static string $resource = ChildHealthDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
