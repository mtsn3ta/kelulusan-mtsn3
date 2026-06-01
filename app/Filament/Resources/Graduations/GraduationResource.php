<?php

namespace App\Filament\Resources\Graduations;

use App\Filament\Resources\Graduations\Pages\CreateGraduation;
use App\Filament\Resources\Graduations\Pages\EditGraduation;
use App\Filament\Resources\Graduations\Pages\ListGraduations;
use App\Filament\Resources\Graduations\Pages\ViewGraduation;
use App\Filament\Resources\Graduations\Schemas\GraduationForm;
use App\Filament\Resources\Graduations\Schemas\GraduationInfolist;
use App\Filament\Resources\Graduations\Tables\GraduationsTable;
use App\Models\Graduation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GraduationResource extends Resource
{
    protected static ?string $model = Graduation::class;
    protected static ?string $navigationLabel = 'Data Kelulusan';

protected static ?string $modelLabel = 'Data Kelulusan';

protected static ?string $pluralModelLabel = 'Data Kelulusan';


    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return GraduationForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return GraduationInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GraduationsTable::configure($table);
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
            'index' => ListGraduations::route('/'),
            'create' => CreateGraduation::route('/create'),
            'view' => ViewGraduation::route('/{record}'),
            'edit' => EditGraduation::route('/{record}/edit'),
        ];
    }
}
