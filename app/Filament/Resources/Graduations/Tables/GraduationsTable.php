<?php

namespace App\Filament\Resources\Graduations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;


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
                //
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
