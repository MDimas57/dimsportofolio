<?php

namespace App\Filament\Resources\ContactSettings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ContactSettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                TextColumn::make('phone_number')
                    ->label('No. WA/HP')
                    ->searchable(),

                TextColumn::make('whatsapp_message')
                    ->label('Pesan Auto WA')
                    ->limit(30)
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('instagram_url')
                    ->label('Instagram')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('tiktok_url')
                    ->label('TikTok')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('github_url')
                    ->label('GitHub')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('linkedin_url')
                    ->label('LinkedIn')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('youtube_url')
                    ->label('YouTube')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Terakhir Diperbarui')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
