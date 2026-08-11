<?php

namespace App\Filament\Resources\CertificationSections\Pages;

use App\Filament\Resources\CertificationSections\CertificationSectionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCertificationSections extends ListRecords
{
    protected static string $resource = CertificationSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}