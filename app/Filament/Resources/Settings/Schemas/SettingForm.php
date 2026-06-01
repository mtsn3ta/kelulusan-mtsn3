<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('school_name')
    ->label('Nama Sekolah')
    ->required(),

TextInput::make('academic_year')
    ->label('Tahun Pelajaran')
    ->required(),

DateTimePicker::make('announcement_date')
    ->label('Tanggal Pengumuman')
    ->required(),

FileUpload::make('background_image')
    ->label('Foto Angkatan')
    ->directory('backgrounds')
    ->image()
    ->disk('public')
    ->imageEditor(),

Textarea::make('principal_message')
    ->label('Sambutan Kepala Madrasah')
    ->rows(6)
    ->columnSpanFull(),

Toggle::make('is_active')
    ->label('Aktifkan Pengumuman')
    ->default(true),
            ]);
    }
}
