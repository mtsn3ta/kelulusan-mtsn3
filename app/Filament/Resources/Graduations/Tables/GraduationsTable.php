<?php

namespace App\Filament\Resources\Graduations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;


class GraduationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

    TextColumn::make('academic_year')
        ->label('Tahun Pelajaran')
        ->searchable(),

    TextColumn::make('nisn')
        ->label('NISN')
        ->searchable(),

    TextColumn::make('name')
        ->label('Nama Siswa')
        ->searchable(),

    TextColumn::make('class')
        ->label('Kelas')
        ->searchable(),

    TextColumn::make('status')
        ->label('Status')
        ->badge()
        ->color(fn (string $state): string => match ($state) {
            'LULUS' => 'success',
            'TIDAK LULUS' => 'danger',
            default => 'gray',
        }),

    TextColumn::make('participant_number')
        ->label('No Peserta')
        ->searchable(),

    TextColumn::make('birth_place_date')
        ->label('TTL')
        ->toggleable(isToggledHiddenByDefault: true),

    TextColumn::make('mtk_score')
        ->label('MTK')
        ->alignEnd(),

    TextColumn::make('indo_score')
        ->label('INDO')
        ->alignEnd(),

    TextColumn::make('mtk_category')
        ->label('Kategori MTK')
        ->toggleable(isToggledHiddenByDefault: true),

    TextColumn::make('indo_category')
        ->label('Kategori INDO')
        ->toggleable(isToggledHiddenByDefault: true),

    TextColumn::make('created_at')
        ->dateTime()
        ->sortable()
        ->toggleable(isToggledHiddenByDefault: true),

    TextColumn::make('updated_at')
        ->dateTime()
        ->sortable()
        ->toggleable(isToggledHiddenByDefault: true),

])
            ->filters([

    SelectFilter::make('status')
        ->label('Status Kelulusan')
        ->options([
            'LULUS' => 'LULUS',
            'TIDAK LULUS' => 'TIDAK LULUS',
        ]),

    SelectFilter::make('class')
        ->label('Kelas')
        ->options(
            fn () => \App\Models\Graduation::query()
                ->distinct()
                ->pluck('class', 'class')
                ->toArray()
        ),

])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
