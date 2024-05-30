<?php

namespace App\Filament\Resources\TemplateResource\Templates;

use App\Enums\Major;
use App\Forms\Components\NimInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;

class KeteranganAktifKuliah extends CreateTemplate
{
    public static ?string $view = 'surat.keterangan-aktif-kuliah';
    
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
            TextInput::make('semester')
                ->minLength(1)
                ->numeric()
                ->required(),
            TextInput::make('awal_akademik')
                ->label('Tahun Masuk Akademik')
                ->numeric()
                ->required(),
            TextInput::make('akhir_akademik')
                ->label('Tahun Akhir Akademik')
                ->numeric()
                ->required(),
            TextInput::make('keterangan')
                ->label('Tujuan Pengajuan Surat')
                ->minLength(10)
                ->maxLength(255)
                ->placeholder('Untuk')
                ->required(),
            Repeater::make('orangTua')
                ->label('Data Orang Tua/Wali')
                ->schema([
                    TextInput::make('nama_ortu')
                        ->label('Nama Orang Tua/Wali')
                        ->minLength(3)
                        ->maxLength(255)
                        ->required(),
                    TextInput::make('pekerjaan')
                        ->label('Pekerjaan Orang Tua/Wali')
                        ->minLength(3)
                        ->maxLength(255)
                        ->required(),
                    TextInput::make('nip')
                        ->label('NIP')
                        ->minLength(3)
                        ->maxLength(255)
                        ->required(),
                    TextInput::make('pangkat')
                        ->label('Pangkat/Gol')
                        ->minLength(1)
                        ->maxLength(255)
                        ->required(),
                    TextInput::make('instansi')
                        ->minLength(3)
                        ->maxLength(255)
                        ->required(),
                ])
                ->columnSpan('full')
                ->maxItems(1)
                ->required(),
        ];
    }
}
