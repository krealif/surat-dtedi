<?php

namespace App\Filament\Resources;

use App\Models\Template;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Columns\Layout\Stack;
use App\Filament\Resources\TemplateResource\Pages;
use Filament\Tables\Columns\IconColumn;

class TemplateResource extends Resource
{
    protected static ?string $model = Template::class;

    protected static ?string $navigationIcon = 'heroicon-o-square-2-stack';

    protected static ?int $navigationSort = 1;

    protected static ?string $slug = '/';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Stack::make([
                    IconColumn::make('name')
                        ->icon('heroicon-s-document'),
                    TextColumn::make('name')
                        ->label('Nama')
                        ->size(TextColumn\TextColumnSize::Medium)
                        ->searchable(true),
                ])->space(2)
            ])
            ->contentGrid([
                'sm' => 1,
                'md' => 2,
                'xl' => 3,
            ])
            ->defaultSort('name')
            ->recordUrl(
                fn (Model $record): string => Pages\CreateFromTemplate::getUrl([$record->id]),
            );
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTemplates::route('/'),
            'createFromTemplate' => Pages\CreateFromTemplate::route('/templates/{record}'),
        ];
    }
}
