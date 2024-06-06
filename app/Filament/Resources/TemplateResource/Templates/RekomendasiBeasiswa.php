<?php

namespace App\Filament\Resources\TemplateResource\Templates;

use App\Forms\Components\IpkInput;
use App\Forms\Components\NimInput;
use Filament\Forms\Components\TextInput;

class RekomendasiBeasiswa extends CreateTemplate
{
    public static ?string $view = 'surat.rekomendasi-beasiswa';

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
            IpkInput::make('ipk')
                ->label('IPK')
                ->validationAttribute('IPK')
                ->format()
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
                ->label('Pemberi Beasiswa')
                ->minLength(3)
                ->maxLength(255)
                ->required(),
        ];
    }
}
