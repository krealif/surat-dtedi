<?php

namespace App\Filament\Resources\TemplateResource\Templates;

use App\Enums\Major;
use App\Forms\Components\NimInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class KeteranganAlumni extends CreateTemplate
{
    public static ?string $view = 'surat.keterangan-alumni';
    
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
            Select::make('prodi')
                ->label('Program Studi')
                ->options(Major::toArray())
                ->required(),
            TextInput::make('tahun_lulus')
                ->label('Tahun Lulus')
                ->numeric()
                ->required(),
            TextInput::make('keterangan')
                ->label('Tujuan Pengajuan Surat')
                ->minLength(10)
                ->maxLength(255)
                ->placeholder('Untuk')
                ->required(),
            
        ];
    }
}
