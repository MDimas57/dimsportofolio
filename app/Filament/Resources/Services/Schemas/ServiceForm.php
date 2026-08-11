<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul Service / Skill')
                    ->placeholder('misal: Web Development')
                    ->required(),

                Textarea::make('icon')
                    ->label('SVG Icon / Path')
                    ->placeholder('Masukkan kode SVG <svg>...</svg>')
                    ->rows(3),

                Textarea::make('description')
                    ->label('Deskripsi Service')
                    ->placeholder('Building fast, responsive and modern web applications.')
                    ->rows(3)
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
