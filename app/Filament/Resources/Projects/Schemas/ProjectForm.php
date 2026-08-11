<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(2)->components([
                    TextInput::make('title')
                        ->label('Judul Project')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),

                    TextInput::make('slug')
                        ->label('Slug')
                        ->required()
                        ->unique(ignoreRecord: true),
                ]),

                FileUpload::make('thumbnail')
                    ->label('Thumbnail Project')
                    ->image()
                    ->directory('projects')
                    ->imageEditor()
                    ->columnSpanFull(),

                RichEditor::make('description')
                    ->label('Deskripsi')
                    ->columnSpanFull(),

                TagsInput::make('tech_stack')
                    ->label('Tech Stack (Tekan Enter untuk menambah)')
                    ->placeholder('Contoh: Laravel, Tailwind, Vue.js')
                    ->columnSpanFull(),

                Grid::make(2)->components([
                    TextInput::make('demo_url')
                        ->label('URL Demo Live')
                        ->url()
                        ->placeholder('https://example.com'),

                    TextInput::make('github_url')
                        ->label('URL Repository GitHub')
                        ->url()
                        ->placeholder('https://github.com/...'),
                ]),

                Grid::make(3)->components([
                    TextInput::make('order')
                        ->label('Urutan Tampil')
                        ->numeric()
                        ->default(0),

                    Toggle::make('is_featured')
                        ->label('Project Unggulan')
                        ->default(false),

                    Toggle::make('is_active')
                        ->label('Tampilkan')
                        ->default(true),
                ]),
            ]);
    }
}
