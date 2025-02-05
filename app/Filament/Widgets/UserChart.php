<?php

namespace App\Filament\Widgets;

use App\Models\Child;
use App\Models\User;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class UserChart extends ChartWidget
{
    protected static ?string $heading = 'Total Users Monitored';
    protected static ?string $pollingInterval = '2s';
    protected int | string | array $columnSpan = 'xl';
    public ?string $filter = 'year';

    protected function getData(): array
    {
        $filter = $this->filter ?? 'year';
        $startDate = $this->getStartDate($filter);
        $userData = Trend::model(User::class)
                ->between($startDate, now())
                ->{($filter === 'today' || $filter === 'week') ? 'perDay' : 'perMonth'}()
                ->count();
                
        return [
            'datasets' => [
                [
                    'label' => 'Total Users Monitored',
                    'data' => $userData->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)', // Gradient effect
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'fill' => true,
                    'tension' => 0.4, // Smooth lines
                ],
            ],
            'labels' => $userData->map(fn (TrendValue $value) => Carbon::parse($value->date)->format('M Y')),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getFilters(): ?array
    {
        return [
            'today' => 'Today',
            'week' => 'Last Week',
            'month' => 'Last Month',
            'year' => 'This Year',
        ];
    }

    protected function getStartDate(string $filter): Carbon
    {
        return match ($filter) {
            'today' => now()->startOfDay(),
            'week' => now()->subWeek(),
            'month' => now()->subMonth(),
            'year' => now()->startOfYear(),
            default => now()->startOfYear(),
        };
    }
}