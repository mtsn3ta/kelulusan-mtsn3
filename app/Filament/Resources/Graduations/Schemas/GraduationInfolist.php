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

                TextEntry::make('academic_year')
                    ->label('Tahun Pelajaran'),

                TextEntry::make('nisn')
                    ->label('NISN'),

                TextEntry::make('name')
                    ->label('Nama Siswa'),

                TextEntry::make('class')
                    ->label('Kelas'),

                TextEntry::make('status')
                    ->label('Status Kelulusan')
                    ->badge(),

                TextEntry::make('participant_number')
                    ->label('Nomor Peserta')
                    ->placeholder('-'),

                TextEntry::make('birth_place_date')
                    ->label('Tempat, Tanggal Lahir')
                    ->placeholder('-'),

                TextEntry::make('mtk_score')
                    ->label('Nilai Matematika')
                    ->placeholder('-'),

                TextEntry::make('mtk_category')
                    ->label('Kategori Matematika')
                    ->placeholder('-'),

                TextEntry::make('indo_score')
                    ->label('Nilai Bahasa Indonesia')
                    ->placeholder('-'),

                TextEntry::make('indo_category')
                    ->label('Kategori Bahasa Indonesia')
                    ->placeholder('-'),

                TextEntry::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->placeholder('-'),

                TextEntry::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime()
                    ->placeholder('-'),

            ]);
    }
}
