<?php

namespace App\Filament\Resources\ReportSpjs\Pages;

use App\Filament\Resources\ReportSpjs\ReportSpjResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewReportSpj extends ViewRecord
{
    protected static string $resource = ReportSpjResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
