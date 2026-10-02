<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SiteSettingsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Identitas Navbar & Website')
                    ->description('Atur nama dan logo gambar yang akan ditampilkan pada navbar.')
                    ->schema([
                        TextInput::make('site_name')
                            ->label('Nama Lengkap / Site Name')
                            ->placeholder('Contoh: M Dimas Stiyawan')
                            ->required()
                            ->maxLength(255),

                        FileUpload::make('site_logo')
                            ->label('Logo Gambar Navbar')
                            ->image()
                            ->disk('public')
                            ->directory('site-settings')
                            ->visibility('public')
                            ->imageEditor()
                            ->helperText('Unggah gambar logo (PNG/JPG/SVG). Jika kosong, navbar akan menampilkan inisial teks otomatis.')
                            ->maxSize(2048),
                    ]),
            ]);
    }
}