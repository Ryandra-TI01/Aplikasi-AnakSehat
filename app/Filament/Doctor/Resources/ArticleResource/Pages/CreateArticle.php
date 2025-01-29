<?php

namespace App\Filament\Doctor\Resources\ArticleResource\Pages;

use App\Filament\Doctor\Resources\ArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateArticle extends CreateRecord
{
    protected static string $resource = ArticleResource::class;
}
