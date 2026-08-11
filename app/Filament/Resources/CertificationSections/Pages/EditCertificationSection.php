<?php

namespace App\Filament\Resources\CertificationSections\Pages;

use App\Filament\Resources\CertificationSections\CertificationSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCertificationSection extends EditRecord
{
    protected static string $resource = CertificationSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
