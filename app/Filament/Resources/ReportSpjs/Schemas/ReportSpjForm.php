<?php

namespace App\Filament\Resources\ReportSpjs\Schemas;

use App\ReportStatus;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ReportSpjForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                DatePicker::make('activity_date')
                    ->required(),
                TextInput::make('location')
                    ->required(),
                Select::make('sector_id')
                    ->label('Bidang')
                    ->relationship('sector', 'name')
                    ->preload()
                    ->searchable()
                    ->required(),
                Select::make('status')
                    ->options(ReportStatus::class)
                    ->visible(fn($record) => auth()->user()->hasAnyRole('admin', 'super_admin'))
                    ->default(ReportStatus::Draft)
                    ->required(),
                TextInput::make('total_budget')
                    ->label('Total Anggaran')
                    ->required(),
                TextInput::make('total_realization')
                    ->required()
                    ->numeric()
                    ->default(0),
                Textarea::make('purpose')
                    ->columnSpanFull(),
                SpatieMediaLibraryFileUpload::make('proof_images')
                    ->disk('public')
                    ->collection('report_spj_proof_images')
                    ->multiple()
                    ->columnSpanFull(),
            ]);
    }
}
