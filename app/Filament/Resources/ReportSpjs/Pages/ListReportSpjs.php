<?php

namespace App\Filament\Resources\ReportSpjs\Pages;

use App\Filament\Resources\ReportSpjs\ReportSpjResource;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Container\Attributes\Auth;

class ListReportSpjs extends ListRecords
{
    protected static string $resource = ReportSpjResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
