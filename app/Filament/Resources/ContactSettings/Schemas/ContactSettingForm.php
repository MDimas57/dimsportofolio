<?php

namespace App\Filament\Resources\ContactSettings\Schemas; // 1. Pastikan namespace sesuai (ContactSettings)

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ContactSettingForm // 2. Ubah nama class dari ContactSectionForm ke ContactSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->placeholder('dimasstiyawan@gmail.com')
                    ->required(),

                TextInput::make('phone_number')
                    ->label('Nomor WhatsApp / HP')
                    ->tel()
                    ->placeholder('628123456789')
                    ->required(),

                TextInput::make('whatsapp_message')
                    ->label('Pesan Otomatis WhatsApp')
                    ->default('Halo Dimas, saya ingin berdiskusi mengenai proyek.')
                    ->columnSpanFull(),

                TextInput::make('instagram_url')
                    ->label('Link Instagram')
                    ->url()
                    ->placeholder('https://instagram.com/username'),

                TextInput::make('tiktok_url')
                    ->label('Link TikTok')
                    ->url()
                    ->placeholder('https://tiktok.com/@username'),

                TextInput::make('github_url')
                    ->label('Link GitHub')
                    ->url()
                    ->placeholder('https://github.com/username'),

                TextInput::make('linkedin_url')
                    ->label('Link LinkedIn')
                    ->url()
                    ->placeholder('https://linkedin.com/in/username'),

                TextInput::make('youtube_url')
                    ->label('Link YouTube')
                    ->url()
                    ->placeholder('https://youtube.com/@username')
                    ->columnSpanFull(),
            ]);
    }
}
