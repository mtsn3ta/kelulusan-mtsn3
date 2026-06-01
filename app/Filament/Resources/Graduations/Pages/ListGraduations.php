<?php

namespace App\Filament\Resources\Graduations\Pages;

use App\Filament\Imports\GraduationImporter;
use App\Filament\Resources\Graduations\GraduationResource;
use App\Models\Graduation;
use App\Models\Setting;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Actions\ImportAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ListGraduations extends ListRecords
{
    protected static string $resource = GraduationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
Action::make('panduan')
    ->label('Panduan Import')
    ->icon('heroicon-o-information-circle')
    ->color('gray')
    ->modalHeading('Panduan Import Data Kelulusan')
    ->modalContent(view('filament.graduations.import-guide')),
            Action::make('downloadTemplate')
    ->label('Download Template')
    ->icon('heroicon-o-arrow-down-tray')
    ->url(asset('template/template-kelulusan.csv'))
    ->openUrlInNewTab(),

            ImportAction::make()
                ->label('Import Excel')
                ->importer(GraduationImporter::class),

            Action::make('kosongkanData')
                ->label('Kosongkan Data Tahun Aktif')
                ->icon('heroicon-o-trash')
                ->color('danger')
                ->requiresConfirmation()
                ->modalHeading('Hapus Data Kelulusan')
                ->modalDescription('Semua data pada tahun pelajaran aktif akan dihapus.')
                ->action(function () {

                    $setting = Setting::first();

                    if ($setting) {
                        Graduation::where(
                            'academic_year',
                            $setting->academic_year
                        )->delete();
                    }

                    Notification::make()
                        ->title('Data berhasil dihapus')
                        ->success()
                        ->send();
                }),
        ];
    }
}