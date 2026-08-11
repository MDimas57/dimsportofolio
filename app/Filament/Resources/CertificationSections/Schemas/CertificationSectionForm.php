<?php

namespace App\Filament\Resources\CertificationSections\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

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
                    ->required(),

                FileUpload::make('back_image')
                    ->label('Foto Tampak Belakang / Transkrip')
                    ->directory('certificates')
                    ->image()
                    ->helperText('Opsional. Jika kosong, bagian belakang akan menampilkan informasi detail teks.'),

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
