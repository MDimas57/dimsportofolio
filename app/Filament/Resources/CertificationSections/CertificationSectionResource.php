<?php

namespace App\Filament\Resources\CertificationSections;

use App\Filament\Resources\CertificationSections\Pages\CreateCertificationSection;
use App\Filament\Resources\CertificationSections\Pages\EditCertificationSection;
use App\Filament\Resources\CertificationSections\Pages\ListCertificationSections;
use App\Filament\Resources\CertificationSections\Schemas\CertificationSectionForm;
use App\Filament\Resources\CertificationSections\Tables\CertificationSectionsTable;
use App\Models\Certification;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CertificationSectionResource extends Resource
{
    protected static ?string $model = Certification::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'certification';

    public static function form(Schema $schema): Schema
    {
        return CertificationSectionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CertificationSectionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCertificationSections::route('/'),
            'create' => CreateCertificationSection::route('/create'),
            'edit' => EditCertificationSection::route('/{record}/edit'),
        ];
    }
}
