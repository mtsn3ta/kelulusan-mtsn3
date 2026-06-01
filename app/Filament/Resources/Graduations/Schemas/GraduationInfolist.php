<?php

namespace App\Filament\Resources\Graduations\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class GraduationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('academic_year'),
                TextEntry::make('nisn'),
                TextEntry::make('name'),
                TextEntry::make('class'),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
