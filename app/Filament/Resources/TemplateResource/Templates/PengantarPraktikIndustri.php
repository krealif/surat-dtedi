<?php

namespace App\Filament\Resources\TemplateResource\Templates;

use App\Enums\Major;
use App\Forms\Components\NimInput;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;


class PengantarPraktikIndustri extends CreateTemplate
{
    public static ?string $view = 'surat.pengantar-praktik-industri';
    
    public static function getSchema(): array
    {
        $helperText = "Contoh:<br>Yth. Kepala <br>
                    Dinas Komunikasi dan Informatika Kabupaten Sleman,<br>
                    Jl. Parasamya No. 1, Beran, Tridadi, Kec. Sleman,<br>
                    Kabupaten Sleman, Daerah Istimewa Yogyakarta 55511";
                    
        return [
            Section::make([
                Textarea::make('tujuan')
                    ->rows(4)
                    ->extraInputAttributes(['style' => 'resize:none'])
                    ->helperText(new HtmlString($helperText))
                    ->columnSpanFull()
                    ->required(),
                DatePicker::make('tgl_mulai')
                    ->label('Tanggal Mulai')
                    ->before('tgl_selesai')
                    ->required(),
                DatePicker::make('tgl_selesai')
                    ->label('Tanggal Selesai')
                    ->required(),
                Select::make('prodi')
                    ->label('Program Studi')
                    ->options(Major::toArray())
                    ->required(),
                TextInput::make('tempat')
                ->minLength(2)
                ->helperText('Contoh: Dinas Komunikasi dan Informatika')
                ->required(),
            ])
                ->columns(2), 
            Section::make([
                Repeater::make('kelompok')
                    ->schema([
                        TextInput::make('nama')
                            ->minLength(2)
                            ->required(),
                        NimInput::make('nim')
                            ->label('NIM')
                            ->validationAttribute('NIM')
                            ->format()
                            ->required(),
                    ])
                    ->addActionLabel('Tambah Anggota')
                    ->reorderableWithButtons()
                    ->columns(2)
                    ->columnSpan('full')
                    ->maxItems(10)
                    ->required(),
            ]),
        ];
    }
}
