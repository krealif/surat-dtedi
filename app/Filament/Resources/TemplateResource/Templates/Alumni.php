<?php

namespace App\Filament\Resources\TemplateResource\Templates;

use App\Enums\Major;
use App\Forms\Components\NimInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use App\Filament\Resources\TemplateResource\Templates\CreateTemplate;

class Alumni extends CreateTemplate
{
    public static ?string $view = 'surat.alumni';

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
            Select::make('jurusan')
                ->options(Major::toArray())
                ->required(),
            TextInput::make('tahun')
                ->label('Tahun Lulus')
                ->minLength(3)
                ->maxLength(255)
                ->required(),
            TextInput::make('keterangan_surat')
                ->label('Keterangan Surat')
                ->minLength(3)
                ->maxLength(255)
                ->required(),
        ];
    }
}
