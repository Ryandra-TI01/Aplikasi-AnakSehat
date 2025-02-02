<?php

namespace App\Filament\Doctor\Resources\ArticleResource\Pages;

use App\Filament\Doctor\Resources\ArticleResource;
use App\Models\User;
use App\Notifications\NewArticleNotification;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateArticle extends CreateRecord
{
    protected static string $resource = ArticleResource::class; 
    protected function afterCreate(): void
    {
        // Ambil semua user dengan role admin
        $admins = User::role('admin')->get();

        // Kirim notifikasi ke admin
        // Notification::make()
        //     ->title("Waiting for approval...")
        //     ->icon('heroicon-s-exclamation-circle')
        //     ->iconColor('warning')
        //     ->body('Artikel baru telah ditambahkan oleh dokter ' . $this->record->user->name)
        //     ->sendToDatabase($admins);
        Notification::make()
            ->title("Waiting for approval...")
            ->icon('heroicon-s-exclamation-circle')
            ->iconColor('warning')
            ->body('Artikel baru telah ditambahkan oleh dokter ' . $this->record->user->name)
            ->sendToDatabase($admins)
            ->broadcast($admins);
    }
}
