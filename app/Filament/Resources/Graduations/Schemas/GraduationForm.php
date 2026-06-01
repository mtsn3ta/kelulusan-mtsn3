<?php

namespace App\Filament\Resources\Graduations\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GraduationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('nisn')
                    ->label('NISN')
                    ->required()
                    ->maxLength(20)
                    ->unique(ignoreRecord: true)
                    ->validationMessages([
                        'unique' => 'NISN sudah terdaftar.',
                    ]),

                TextInput::make('name')
                    ->label('Nama Siswa')
                    ->required(),

                TextInput::make('class')
                    ->label('Kelas')
                    ->required(),

                Select::make('status')
                    ->label('Status Kelulusan')
                    ->options([
                        'LULUS' => 'LULUS',
                        'TIDAK LULUS' => 'TIDAK LULUS',
                    ])
                    ->required()
                    ->native(false),
            ]);
    }
}