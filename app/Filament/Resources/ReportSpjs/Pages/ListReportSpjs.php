<?php

namespace App\Filament\Resources\ReportSpjs\Pages;

use App\Filament\Resources\ReportSpjs\ReportSpjResource;
use Filament\Actions\CreateAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Actions;
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
    protected function getTableActions():  array
    {
        return [
            Actions::make('approve')
                ->label('setujui')
                ->color('success')
                ->icon('heroicon-o-check-circle')
                ->requiresConfirmation()
                ->visible(fn ($record) => Auth::user()->can('approve_report_spj'))
                ->Actions(function($record){
                    $record->update(['status' => 'approved']);
                    Notification::make()
                        ->title('Laporan disetujui.')
                        ->body('Laporan SPJ berhasil disetujui.')
                        ->success()
                        ->send();
                }),
            Actions::make('reject')
                ->label('tolak')
                ->color('danger')
                ->icon('heroicon-o-x-circle')
                ->requiresConfirmation()
                ->visible(fn ($record) => Auth::user()->can('reject_report_spj'))
                ->action(function($record){
                    $record->update(['status' => 'rejected']);
                    Notification::make()
                        ->title('Laporan ditolak.')
                        ->body('Laporan SPJ berhasil ditolak.')
                        ->success()
                        ->send();
                }),
            Actions::make('revision')
                ->label('revisi')
                ->color('warning')
                ->icon('heroicon-o-rectangle-stack')
                ->requiresConfirmation()
                ->visible(fn ($record) => Auth::user()->can('revisi_report_spj'))
                ->action(function($record){
                    $record->update(['status' => 'revision']);
                    Notification::make()
                        ->title('Laporan direvisi.')
                        ->body('Laporan SPJ berhasil direvisi.')
                        ->success()
                        ->send();
                }),
            Actions::make('review')
                ->label('tinjau ulang')
                ->color('primary')
                ->icon('heroicon-o-clipboard-check')
                ->requiresConfirmation()
                ->visible(fn ($record) => Auth::user()->can('review_report_spj'))
                ->action(function($record){
                    $record->update(['status' => 'review']);
                    Notification::make()
                        ->title('Laporan ditinjau ulang.')
                        ->body('Laporan SPJ berhasil ditinjau ulang.')
                        ->success()
                        ->send();
                }),
            ];
    }
}
