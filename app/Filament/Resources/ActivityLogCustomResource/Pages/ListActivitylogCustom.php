<?php

// namespace App\Filament\Resources\ActivitylogResource\Pages;
namespace App\Filament\Resources\ActivityLogCustomResource\Pages;
use App\Filament\Resources\ActivityLogCustomResource;
use Filament\Resources\Pages\ListRecords;
use Rmsramos\Activitylog\Resources\ActivitylogResource;

class ListActivitylogCustom extends ListRecords
{
    protected static string $resource = ActivityLogCustomResource::class;
}
