<?php

namespace App\Filament\Resources\HeroSections\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class HeroSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('sub_title')
                    ->label('Sub Title / Role')
                    ->placeholder('misal: SOFTWARE DEVELOPER')
                    ->required()
                    ->default('SOFTWARE DEVELOPER'),

                TextInput::make('name')
                    ->label('Nama Lengkap')
                    ->placeholder('misal: Abdullah Tariq')
                    ->required(),

                Textarea::make('bio')
                    ->label('Deskripsi Ringkas / Bio')
                    ->rows(3)
                    ->required()
                    ->columnSpanFull(),

                TagsInput::make('highlights')
                    ->label('Highlights / Badges')
                    ->placeholder('Tambah poin (misal: Clean Code, Scalable Solutions)')
                    ->helperText('Tekan Enter setelah mengetik setiap poin')
                    ->default(null)
                    ->columnSpanFull(),

                TextInput::make('cta_primary_text')
                    ->label('Teks Tombol Utama')
                    ->required()
                    ->default('View My Work'),

                TextInput::make('cta_primary_link')
                    ->label('Link Tombol Utama')
                    ->required()
                    ->default('#projects'),

                FileUpload::make('cv_file_path')
                    ->label('File CV (PDF)')
                    ->directory('documents')
                    ->acceptedFileTypes(['application/pdf'])
                    ->maxSize(5120)
                    ->default(null),

                FileUpload::make('profile_image')
                    ->label('Foto Profil Hero')
                    ->directory('hero-images')
                    ->image()
                    ->imageEditor(),

                TextInput::make('experience_years')
                    ->label('IPK')
                    ->placeholder('3+')
                    ->default('3+'),

                TextInput::make('projects_completed')
                    ->label('Sertifikat')
                    ->placeholder('20+')
                    ->default('20+'),

                TextInput::make('happy_clients')
                    ->label('Project Selesai')
                    ->placeholder('10+')
                    ->default('10+'),
            ]);
    }
}