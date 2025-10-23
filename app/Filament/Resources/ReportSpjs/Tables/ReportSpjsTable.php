<?php

namespace App\Filament\Resources\ReportSpjs\Tables;

use App\ReportStatus;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ReportSpjsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('activity_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('location')
                    ->searchable(),
                TextColumn::make('sector.name')
                    ->label('Bidang')
                    ->sortable(),
                TextColumn::make('total_budget')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('total_realization')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('status')
                    ->color(ReportStatus::class)
                    ->badge()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('sector_id')
                    ->name('Bidang')
                    ->relationship('sector', 'name')
                    ->searchable()
                    ->multiple()
                    ->preload(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),

                ActionGroup::make([])
                    ->visible(fn($record) => auth()->user()->hasAnyRole('admin', 'super_admin'))
                    ->actions([
                        Action::make('approve')
                            ->label('setujui')
                            ->color('success')
                            ->icon(Heroicon::CheckCircle)
                            ->requiresConfirmation()
                            ->visible(fn($record) => auth()->user()->can('approve:report_spj'))
                            ->action(function ($record) {
                                $record->update(['status' => 'approved']);
                                Notification::make()
                                    ->title('Laporan disetujui.')
                                    ->body('Laporan SPJ berhasil disetujui.')
                                    ->success()
                                    ->send();
                            }),
                        Action::make('reject')
                            ->label('tolak')
                            ->color('danger')
                            ->icon(Heroicon::XCircle)
                            ->requiresConfirmation()
                            ->visible(fn($record) => auth()->user()->can('reject:report_spj'))
                            ->action(function ($record) {
                                $record->update(['status' => 'rejected']);
                                Notification::make()
                                    ->title('Laporan ditolak.')
                                    ->body('Laporan SPJ berhasil ditolak.')
                                    ->success()
                                    ->send();
                            }),
                        Action::make('revision')
                            ->label('revisi')
                            ->color('warning')
                            ->icon(Heroicon::ArrowPath)
                            ->requiresConfirmation()
                            ->visible(fn($record) => auth()->user()->can('revision:report_spj'))
                            ->action(function ($record) {
                                $record->update(['status' => 'revision']);
                                Notification::make()
                                    ->title('Laporan direvisi.')
                                    ->body('Laporan SPJ berhasil direvisi.')
                                    ->success()
                                    ->send();
                            }),
                        Action::make('review')
                            ->label('tinjau ulang')
                            ->color('primary')
                            ->icon(Heroicon::MagnifyingGlass)
                            ->requiresConfirmation()
                            ->visible(fn($record) => auth()->user()->can('review:report_spj'))
                            ->action(function ($record) {
                                $record->update(['status' => 'review']);
                                Notification::make()
                                    ->title('Laporan ditinjau ulang.')
                                    ->body('Laporan SPJ berhasil ditinjau ulang.')
                                    ->success()
                                    ->send();
                            }),
                    ])
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
