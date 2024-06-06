<?php

namespace App\Filament\Resources\TemplateResource\Templates;

use App\Enums\Major;
use App\Forms\Components\NimInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class MagangPmmb extends CreateTemplate
{
    public static ?string $view = 'surat.magang-pmmb';

    public static function getSchema(): array
    {
        return [
            Section::make([
                TextInput::make('nama')
                    ->minLength(2)
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
                TextInput::make('dospem')
                    ->label('Dosen Pembimbing')
                    ->minLength(2)
                    ->required(),
                TextInput::make('penyelenggara')
                    ->label('Penyelenggara Magang')
                    ->minLength(2)
                    ->required(),
                DatePicker::make('tgl_mulai')
                    ->label('Tanggal Mulai')
                    ->before('tgl_selesai')
                    ->required(),
                DatePicker::make('tgl_selesai')
                    ->label('Tanggal Selesai')
                    ->required(),
            ])
                ->columns(2),
        ];
    }
}
