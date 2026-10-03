<?php

namespace App\Filament\Resources\AboutSections\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Format;
use Intervention\Image\ImageManager;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

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
                    ->columnSpanFull()
                    ->saveUploadedFileUsing(function (TemporaryUploadedFile $file) {
                        $manager = ImageManager::usingDriver(Driver::class);
                        $image = $manager->decodePath($file->getRealPath());

                        // Encode ke format WebP (Kualitas 80%)
                        $encoded = $image->encodeUsingFormat(Format::WEBP, quality: 80);

                        $filename = Str::random(40) . '.webp';
                        $path = 'about-images/' . $filename;

                        Storage::disk('public')->put($path, (string) $encoded);

                        return $path;
                    }),

                TextInput::make('button_text')
                    ->label('Teks Tombol')
                    ->default('More About Me'),

                TextInput::make('button_link')
                    ->label('Link Tombol')
                    ->default('#about'),
            ]);
    }
}