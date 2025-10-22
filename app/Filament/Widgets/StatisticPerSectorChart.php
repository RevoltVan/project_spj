<?php

namespace App\Filament\Widgets;

use App\Models\ReportSpj;
use Filament\Widgets\ChartWidget;

class StatisticPerSectorChart extends ChartWidget
{
    protected ?string $heading = 'Statistic Per Sector Chart';

    protected function getData(): array
    {
        $reports = ReportSpj::query()
            ->selectRaw('sectors.name as sector_name, COUNT(report_spjs.id) as report_count')
            ->join('sectors', 'report_spjs.sector_id', '=', 'sectors.id')
            ->groupBy('sectors.name')
            ->get();

        return [
            'datasets' => $reports->map(fn ($report) => [
                'label' => $report->sector_name,
                'data' => [$report->report_count],
                'backgroundColor' => sprintf('hsl(%d, 70%%, 50%%)', rand(0, 360)),
            ])->toArray(),
            'labels' => $reports->pluck('sector_name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
