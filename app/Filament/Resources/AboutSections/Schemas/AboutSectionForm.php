<?php

namespace App\Filament\Resources\AboutSections\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AboutSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('badge')
                    ->label('Badge Title')
                    ->default('ABOUT ME')
                    ->required(),

                TextInput::make('title')
                    ->label('Main Heading')
                    ->default('Crafting Digital Experiences with Code')
                    ->required(),

                Textarea::make('description')
                    ->label('Deskripsi Ringkas')
                    ->rows(4)
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('name')
                    ->label('Nama Lengkap')
                    ->placeholder('Abdullah Tariq'),

                TextInput::make('location')
                    ->label('Lokasi')
                    ->placeholder('Lahore, Pakistan'),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->placeholder('hello@abdullahtariq.dev'),

                TextInput::make('availability_status')
                    ->label('Status Ketersediaan')
                    ->default('Open to Work'),

                FileUpload::make('image')
                    ->label('Gambar About Me')
                    ->directory('about-images')
                    ->image()
                    ->columnSpanFull(),

                TextInput::make('button_text')
                    ->label('Teks Tombol')
                    ->default('More About Me'),

                TextInput::make('button_link')
                    ->label('Link Tombol')
                    ->default('#about'),
            ]);
    }
}