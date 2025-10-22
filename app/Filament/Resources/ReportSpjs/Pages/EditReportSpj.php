<?php

namespace App\Filament\Resources\ReportSpjs\Pages;

use App\Filament\Resources\ReportSpjs\ReportSpjResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditReportSpj extends EditRecord
{
    protected static string $resource = ReportSpjResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
