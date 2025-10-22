<?php

namespace App\Filament\Resources\ReportSpjs\Schemas;

use App\ReportStatus;
use Filament\Forms\Components\Repeater;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ReportSpjInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('activity_date')
                    ->date(),
                TextEntry::make('location'),
                TextEntry::make('sector.name')
                    ->numeric(),
                TextEntry::make('total_budget')
                    ->numeric(),
                TextEntry::make('total_realization')
                    ->numeric(),
                TextEntry::make('status')
                    ->color(ReportStatus::class)
                    ->badge(),
                TextEntry::make('purpose')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                RepeatableEntry::make('proof_images')
                    ->getStateUsing(fn ($record) => $record->getMedia('report_spj_proof_images'))
                    ->label('Proof Images')
                    ->grid(3)
                    ->schema([
                        ImageEntry::make('file')
                            ->getStateUsing(fn ($record) => asset($record->getUrl()))
                            ->imageWidth(100)
                            ->imageHeight(100)
                            ->url(fn ($record) => asset($record->getUrl()))
                            ->openUrlInNewTab(),
                    ])
            ]);
    }
}
