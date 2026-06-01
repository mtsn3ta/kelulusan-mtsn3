<?php

namespace App\Filament\Resources\Graduations\Pages;

use App\Filament\Resources\Graduations\GraduationResource;
use App\Models\Setting;
use Filament\Resources\Pages\CreateRecord;

class CreateGraduation extends CreateRecord
{
    protected static string $resource = GraduationResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $setting = Setting::first();

        $data['academic_year'] = $setting?->academic_year;

        return $data;
    }
}