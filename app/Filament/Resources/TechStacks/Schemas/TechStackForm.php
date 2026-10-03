<?php

namespace App\Filament\Resources\TechStacks\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Format;
use Intervention\Image\ImageManager;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

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
                    ->directory('tech-stacks') // Tersimpan di storage/app/public/tech-stacks
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml'])
                    ->required()
                    ->saveUploadedFileUsing(function (TemporaryUploadedFile $file) {
                        $extension = strtolower($file->getClientOriginalExtension());

                        // Jika formatnya SVG, simpan file asli tanpa konversi raster
                        if ($extension === 'svg' || $file->getMimeType() === 'image/svg+xml') {
                            $filename = Str::random(40) . '.svg';
                            $path = 'tech-stacks/' . $filename;
                            
                            Storage::disk('public')->putFileAs('tech-stacks', $file, $filename);
                            
                            return $path;
                        }

                        // Untuk raster image (PNG, JPG, dll.), konversi ke WebP
                        $manager = ImageManager::usingDriver(Driver::class);
                        $image = $manager->decodePath($file->getRealPath());

                        $encoded = $image->encodeUsingFormat(Format::WEBP, quality: 80);

                        $filename = Str::random(40) . '.webp';
                        $path = 'tech-stacks/' . $filename;

                        Storage::disk('public')->put($path, (string) $encoded);

                        return $path;
                    }),

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