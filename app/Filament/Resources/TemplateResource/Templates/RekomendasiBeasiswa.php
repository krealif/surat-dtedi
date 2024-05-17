<?php

namespace App\Filament\Resources\TemplateResource\Templates;

use App\Enums\Major;
use App\Forms\Components\IpkInput;
use App\Forms\Components\NimInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Number;
use App\Filament\Resources\TemplateResource\Templates\CreateTemplate;

class RekomendasiBeasiswa extends CreateTemplate
{
    public static ?string $view = 'surat.rekomendasi-beasiswa';

    /**
     * Define form schema.
     */
    public static function getSchema(): array
    {
        return [
            TextInput::make('nama')
                ->minLength(3)
                ->maxLength(255)
                ->required(),
            NimInput::make('nim')
                ->label('NIM')
                ->validationAttribute('NIM')
                ->format()
                ->required(),
            TextInput::make('ipk')
                ->label('IPK')
                ->numeric()
                ->inputMode('decimal')
                ->placeholder('0.00 - 4.00')
                ->required(),
            TextInput::make('sks')
                ->label('SKS')
                ->minLength(2)
                ->maxLength(3)
                ->required(),
            TextInput::make('alamat')
                ->minLength(3)
                ->maxLength(255)
                ->required(),
            TextInput::make('beasiswa')
                ->minLength(3)
                ->maxLength(255)
                ->required(),
        ];
    }
}
