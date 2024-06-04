<?php

namespace App\Filament\Resources\TemplateResource\Templates;

use App\Enums\Major;
use App\Forms\Components\NimInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class PraktikIndustri extends CreateTemplate
{
    public static ?string $view = 'surat.praktik-industri';

    public static function getSchema(): array
    {
        return [
            TextInput::make('perusahaan')
                ->minLength(3)
                ->maxLength(255)
                ->required(),
            TextInput::make('dospem')
                ->label('Dosen pembimbing')
                ->minLength(3)
                ->maxLength(255)
                ->required(),
            DatePicker::make('tgl_mulai')
                ->label('Tanggal mulai')
                ->before('tgl_selesai')
                ->required(),
            DatePicker::make('tgl_selesai')
                ->label('Tanggal selesai')
                ->required(),
            Repeater::make('kelompok')
                ->schema([
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
                ])
                ->addActionLabel('Tambah anggota')
                ->columns(2)
                ->columnSpan('full')
                ->maxItems(10)
                ->required(),
        ];
    }
}
