<?php

namespace App\Filament\Resources\ActivityLogCustomResource\Pages;
use App\Filament\Resources\ActivityLogCustomResource;
use Filament\Resources\Pages\ViewRecord;
use Rmsramos\Activitylog\Resources\ActivitylogResource;

class ViewActivitylogCustom extends ViewRecord
{

    public static function getResource(): string
    {
        return ActivityLogCustomResource::class;
    }
}
