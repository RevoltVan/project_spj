<?php

namespace App\Filament\Widgets;

use App\Models\ReportSpj;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends StatsOverviewWidget
{
    protected int | array | null $columns = 5;

    protected function getStats(): array
    {
        return [
            Stat::make('Total SPJ', ReportSpj::count())->icon(Heroicon::DocumentText)->color('primary'),
            Stat::make('Draft SPJ', ReportSpj::where('status', 'draft')->count())->icon(Heroicon::PencilSquare)->color('secondary'),
            Stat::make('Submitted SPJ', ReportSpj::where('status', 'submitted')->count())->icon(Heroicon::PaperAirplane)->color('warning'),
            Stat::make('Approved SPJ', ReportSpj::where('status', 'approved')->count())->icon(Heroicon::CheckCircle)->color('success'),
            Stat::make('Rejected SPJ', ReportSpj::where('status', 'rejected')->count())->icon(Heroicon::XCircle)->color('danger'),
        ];
    }
}
