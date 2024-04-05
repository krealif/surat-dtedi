<?php

namespace App\Filament\Resources\TemplateResource\Templates;

use App\Enums\Major;
use App\Forms\Components\NimInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;

class SuratPI extends CreateTemplate
{
    public static ?string $docView = 'surat.surat-pi';

    public static function getSchema(): array
    {
        return [
            TextInput::make('perusahaan')
                ->minLength(3)
                ->maxLength(255)
                ->required(),
            TextInput::make('pembimbing')
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
                        ->format()
                        ->label('NIM')
                        ->validationAttribute('NIM')
                        ->required(),
                    Select::make('jurusan')
                        ->native(false)
                        ->options(Major::getValues())
                        ->required(),
                ])
                ->addActionLabel('Tambah anggota')
                ->columns(2)
                ->columnSpan('full')
                ->maxItems(10)
                ->required()
        ];
    }
}
