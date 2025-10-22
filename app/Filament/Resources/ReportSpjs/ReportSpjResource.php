<?php

namespace App\Filament\Resources\ReportSpjs;

use App\Filament\Resources\ReportSpjs\Pages\CreateReportSpj;
use App\Filament\Resources\ReportSpjs\Pages\EditReportSpj;
use App\Filament\Resources\ReportSpjs\Pages\ListReportSpjs;
use App\Filament\Resources\ReportSpjs\Pages\ViewReportSpj;
use App\Filament\Resources\ReportSpjs\RelationManagers\FundsRelationManager;
use App\Filament\Resources\ReportSpjs\Schemas\ReportSpjForm;
use App\Filament\Resources\ReportSpjs\Schemas\ReportSpjInfolist;
use App\Filament\Resources\ReportSpjs\Tables\ReportSpjsTable;
use App\Models\ReportSpj;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ReportSpjResource extends Resource
{
    protected static ?string $model = ReportSpj::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::DocumentText;

    protected static string | UnitEnum | null $navigationGroup = 'Planning & Reporting';

    public static function form(Schema $schema): Schema
    {
        return ReportSpjForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ReportSpjInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ReportSpjsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            FundsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListReportSpjs::route('/'),
            'create' => CreateReportSpj::route('/create'),
            'view' => ViewReportSpj::route('/{record}'),
            'edit' => EditReportSpj::route('/{record}/edit'),
        ];
    }
}
