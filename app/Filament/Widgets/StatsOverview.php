<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use App\Models\Child;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalUser = User::count();
        $totalChild = Child::count();
        $totalArticle = Article::count();
        return [
            Stat::make('Total User', $totalUser)
            ->description('32k increase')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),
        Stat::make(' Total Child', $totalChild)
            ->description('7% increase')
            ->descriptionIcon('heroicon-m-arrow-trending-down')
            ->color('danger'),
        Stat::make(' Total Article', $totalChild)
            ->description('7% increase')
            ->descriptionIcon('heroicon-m-arrow-trending-down')
            ->color('success'),
        ];
    }
}
