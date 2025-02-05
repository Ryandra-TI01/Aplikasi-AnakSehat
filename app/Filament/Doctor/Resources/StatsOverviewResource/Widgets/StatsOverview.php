<?php

namespace App\Filament\Doctor\Resources\StatsOverviewResource\Widgets;

use App\Models\Article;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $userId = auth()->user()->id;
        return [
            Stat::make('Article Published By You', Article::where('doctor_id', $userId)->where('status', 'Approved')->count())
                ->description('Articles that have been published')
                ->color('primary'),
            Stat::make('Articles Pending By You', Article::where('doctor_id', $userId)->where('status', 'Awaiting Approval')->count())
                ->description('Articles Awaiting Approval')
                ->color('warning'),
            Stat::make('Total Article Published', Article::where('status', 'Approved')->count())
                    ->description('Articles that have been published')
                    ->color('success'),
            ];
    }
}
