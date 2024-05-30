<?php

namespace App\Filament\Resources\TemplateResource\Templates;

use App\Enums\Major;
use App\Forms\Components\NimInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class TugasMagang extends CreateTemplate
{
    public static ?string $view = 'surat.tugas-magang';
    
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
            TextInput::make('dospem')
                ->label('Dosen Pembimbing')
                ->minLength(3)
                ->maxLength(255)
                ->required(),
            TextInput::make('penyelenggara')
                ->label('Penyelenggara Magang')
                ->minLength(10)
                ->maxLength(255)
                ->placeholder('Untuk')
                ->required(),
            TextInput::make('tahun_kegiatan')
                ->label('Tahun Magang')
                ->numeric()
                ->required(),
            DatePicker::make('tgl_mulai')
                ->label('Tanggal mulai')
                ->before('tgl_selesai')
                ->required(),
            DatePicker::make('tgl_selesai')
                ->label('Tanggal selesai')
                ->required(),
        ];
    }
}
