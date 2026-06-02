<?php

namespace App\Filament\Imports;

use App\Models\Graduation;
use App\Models\Setting;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Support\Number;

class GraduationImporter extends Importer
{
    protected static ?string $model = Graduation::class;

    protected function beforeSave(): void
    {
        $setting = Setting::first();

        $this->record->academic_year = $setting?->academic_year;
    }

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('nisn')
                ->requiredMapping()
                ->rules(['required', 'max:255']),

            ImportColumn::make('name')
                ->requiredMapping()
                ->rules(['required', 'max:255']),

            ImportColumn::make('class')
                ->requiredMapping()
                ->rules(['required', 'max:255']),

            ImportColumn::make('status')
                ->requiredMapping()
                ->rules([
                    'required',
                    'in:LULUS,TIDAK LULUS',
                ]),

            ImportColumn::make('participant_number'),

            ImportColumn::make('birth_place_date'),

            ImportColumn::make('mtk_score')
                ->numeric(),

            ImportColumn::make('indo_score')
                ->numeric(),

            ImportColumn::make('mtk_category'),

            ImportColumn::make('indo_category'),
        ];
    }

    public function resolveRecord(): Graduation
    {
        return Graduation::firstOrNew([
            'nisn' => $this->data['nisn'],
        ]);
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Import data kelulusan selesai. '
            . Number::format($import->successful_rows)
            . ' data berhasil diproses.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' '
                . Number::format($failedRowsCount)
                . ' data gagal diproses.';
        }

        return $body;
    }
}
