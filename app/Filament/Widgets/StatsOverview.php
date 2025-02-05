<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use App\Models\Child;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '2s';
    protected int | string | array $columnSpan = 'full';

    protected function getStats(): array
    {
        return [
        Stat::make('Total User', User::count())
            ->description('Total of Users Monitored')
            ->color('info'),
        Stat::make('Total Child', Child::count())
            ->description('Total of Children Monitored')
            ->color('success'),
        Stat::make('Article Published', Article::where('status', 'Approved')->count())
            ->description('Articles that have been published')
            ->color('primary'),
        Stat::make('Articles Pending', Article::where('status', 'Awaiting Approval')->count())
            ->description('Articles Awaiting Approval')
            ->color('warning'),
        ];
    }
}
