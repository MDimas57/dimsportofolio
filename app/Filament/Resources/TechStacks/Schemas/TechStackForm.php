<?php

namespace App\Filament\Resources\TechStacks\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Schemas\Schema;

class TechStackForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('name')
                    ->label('Nama Tech / Framework')
                    ->placeholder('Contoh: Laravel, Tailwind CSS')
                    ->required(),

                FileUpload::make('icon')
                    ->label('Logo (PNG / SVG / JPG)')
                    ->image()
                    ->directory('tech-stacks') // Tersimpan di storage/app/public/tech-stacks
                    ->imageEditor()
                    ->required(),

                TextInput::make('order')
                    ->label('Urutan Tampil')
                    ->numeric()
                    ->default(0),

                Toggle::make('is_active')
                    ->label('Status Aktif')
                    ->default(true),
            ]);
    }
}