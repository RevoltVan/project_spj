<?php

namespace App\Filament\Resources\ReportSpjs\Pages;

use App\Filament\Resources\ReportSpjs\ReportSpjResource;
use App\ReportStatus;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Icons\Heroicon;

class ViewReportSpj extends ViewRecord
{
    protected static string $resource = ReportSpjResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('submitted')
                ->label('Submit')
                ->color('success')
                ->icon(Heroicon::PaperAirplane)
                ->requiresConfirmation()
                ->visible(fn($record) => in_array($record->status, [ReportStatus::Draft, ReportStatus::Revision]))
                ->action(function ($record) {
                    $record->update(['status' => 'submitted']);
                    Notification::make()
                        ->title('Laporan disetujui.')
                        ->body('Laporan SPJ berhasil disetujui.')
                        ->success()
                        ->send();
                }),
            EditAction::make(),
        ];
    }
}
