<?php

namespace App\Filament\Resources\FundCategories;

use App\Filament\Resources\FundCategories\Pages\CreateFundCategory;
use App\Filament\Resources\FundCategories\Pages\EditFundCategory;
use App\Filament\Resources\FundCategories\Pages\ListFundCategories;
use App\Filament\Resources\FundCategories\Schemas\FundCategoryForm;
use App\Filament\Resources\FundCategories\Tables\FundCategoriesTable;
use App\Models\FundCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class FundCategoryResource extends Resource
{
    protected static ?string $model = FundCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Tag;

    protected static string | UnitEnum | null $navigationGroup = 'Master Data';

    public static function form(Schema $schema): Schema
    {
        return FundCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FundCategoriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFundCategories::route('/'),
            'create' => CreateFundCategory::route('/create'),
            'edit' => EditFundCategory::route('/{record}/edit'),
        ];
    }
}
