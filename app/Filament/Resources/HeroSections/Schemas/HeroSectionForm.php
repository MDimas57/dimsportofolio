<?php

namespace App\Filament\Resources\HeroSections\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Format;
use Intervention\Image\ImageManager;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

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
                    ->imageEditor()
                    ->saveUploadedFileUsing(function (TemporaryUploadedFile $file) {
                        $manager = ImageManager::usingDriver(Driver::class);
                        $image = $manager->decodePath($file->getRealPath());

                        // Encode ke WebP (Kualitas 80%)
                        $encoded = $image->encodeUsingFormat(Format::WEBP, quality: 80);

                        $filename = Str::random(40) . '.webp';
                        $path = 'hero-images/' . $filename;

                        Storage::disk('public')->put($path, (string) $encoded);

                        return $path;
                    }),

                // Komponen Upload Background (Gambar / GIF / Video MP4)
                FileUpload::make('bg_image')
                    ->label('Background Hero (Gambar / GIF / Video MP4)')
                    ->directory('hero-bg')
                    ->acceptedFileTypes([
                        'image/jpeg',
                        'image/png',
                        'image/gif',
                        'image/webp',
                        'video/mp4',
                        'video/quicktime', // Mengizinkan ekstensi .mov jika diunggah dari Mac/iOS
                    ])
                    ->maxSize(20480) // Batas maksimum ditingkatkan ke 20MB untuk menampung video MP4
                    ->helperText('Unggah gambar, animasi GIF, atau video MP4 (Maksimal 20MB)')
                    ->default(null)
                    ->saveUploadedFileUsing(function (TemporaryUploadedFile $file) {
                        $extension = strtolower($file->getClientOriginalExtension());
                        $mimeType = $file->getMimeType();

                        // 1. Jika file yang diunggah adalah Video (MP4/MOV) atau GIF, simpan langsung tanpa pemrosesan gambar
                        if (
                            in_array($extension, ['mp4', 'mov', 'gif']) || 
                            str_contains($mimeType, 'video/') || 
                            $mimeType === 'image/gif'
                        ) {
                            return $file->store('hero-bg', 'public');
                        }

                        // 2. Jika file berupa Gambar Statis (JPG, PNG, WebP), konversi otomatis ke WebP (80% Quality)
                        $manager = ImageManager::usingDriver(Driver::class);
                        $image = $manager->decodePath($file->getRealPath());

                        $encoded = $image->encodeUsingFormat(Format::WEBP, quality: 80);

                        $filename = Str::random(40) . '.webp';
                        $path = 'hero-bg/' . $filename;

                        Storage::disk('public')->put($path, (string) $encoded);

                        return $path;
                    }),

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