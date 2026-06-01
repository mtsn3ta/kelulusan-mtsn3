<?php

namespace App\Filament\Resources\Graduations\Pages;

use App\Filament\Resources\Graduations\GraduationResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewGraduation extends ViewRecord
{
    protected static string $resource = GraduationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
