<?php

namespace App\Filament\Resources\CertificationSections\Schemas;

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

class CertificationSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul Sertifikat')
                    ->placeholder('misal: AWS Certified Solutions Architect')
                    ->required(),

                TextInput::make('issuer')
                    ->label('Penerbit / Lembaga')
                    ->placeholder('misal: Amazon Web Services / Dicoding'),

                TextInput::make('issue_date')
                    ->label('Tanggal / Tahun Terbit')
                    ->placeholder('misal: Jan 2025'),

                TextInput::make('credential_url')
                    ->label('URL Verifikasi Sertifikat')
                    ->url()
                    ->placeholder('https://...'),

                FileUpload::make('front_image')
                    ->label('Foto Tampak Depan')
                    ->directory('certificates')
                    ->image()
                    ->required()
                    ->saveUploadedFileUsing(function (TemporaryUploadedFile $file) {
                        $manager = ImageManager::usingDriver(Driver::class);
                        $image = $manager->decodePath($file->getRealPath());

                        // Encode ke format WebP (Kualitas 80%)
                        $encoded = $image->encodeUsingFormat(Format::WEBP, quality: 80);

                        $filename = Str::random(40) . '.webp';
                        $path = 'certificates/' . $filename;

                        Storage::disk('public')->put($path, (string) $encoded);

                        return $path;
                    }),

                FileUpload::make('back_image')
                    ->label('Foto Tampak Belakang / Transkrip')
                    ->directory('certificates')
                    ->image()
                    ->helperText('Opsional. Jika kosong, bagian belakang akan menampilkan informasi detail teks.')
                    ->saveUploadedFileUsing(function (TemporaryUploadedFile $file) {
                        $manager = ImageManager::usingDriver(Driver::class);
                        $image = $manager->decodePath($file->getRealPath());

                        // Encode ke format WebP (Kualitas 80%)
                        $encoded = $image->encodeUsingFormat(Format::WEBP, quality: 80);

                        $filename = Str::random(40) . '.webp';
                        $path = 'certificates/' . $filename;

                        Storage::disk('public')->put($path, (string) $encoded);

                        return $path;
                    }),

                Textarea::make('description')
                    ->label('Deskripsi / Ringkasan Keahlian')
                    ->rows(3)
                    ->columnSpanFull(),

                TextInput::make('sort_order')
                    ->label('Urutan Tampil')
                    ->numeric()
                    ->default(0),
            ]);
    }
}