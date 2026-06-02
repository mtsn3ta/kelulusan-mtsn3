<?php

namespace App\Filament\Resources\Graduations\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GraduationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Data Siswa')
                    ->schema([

                        TextInput::make('academic_year')
    ->label('Tahun Pelajaran')
    ->default(fn () => \App\Models\Setting::first()?->academic_year)
    ->disabled()
    ->dehydrated()
    ->required(),

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

                    ])
                    ->columns(2),

                Section::make('Hasil Tes Kemampuan Akademik (TKA)')
                    ->schema([

                        TextInput::make('participant_number')
                            ->label('Nomor Peserta'),

                        TextInput::make('birth_place_date')
                            ->label('Tempat, Tanggal Lahir'),

                        TextInput::make('mtk_score')
                            ->label('Nilai Matematika')
                            ->numeric(),

                        TextInput::make('mtk_category')
                            ->label('Kategori Matematika'),

                        TextInput::make('indo_score')
                            ->label('Nilai Bahasa Indonesia')
                            ->numeric(),

                        TextInput::make('indo_category')
                            ->label('Kategori Bahasa Indonesia'),

                    ])
                    ->columns(2)
                    ->collapsible(),

            ]);
    }
}
