<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Template;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\TemplateResource\Pages;

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
                Tables\Columns\TextColumn::make('name')
                    ->searchable(true)
                    ->size('md')
                    ->weight(FontWeight::Medium)
                    ->icon('heroicon-s-document'),
            ])
            ->contentGrid([])
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
