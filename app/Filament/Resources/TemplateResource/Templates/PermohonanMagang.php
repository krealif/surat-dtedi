<?php

namespace App\Filament\Resources\TemplateResource\Templates;

use App\Enums\Major;
use App\Forms\Components\NimInput;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;

class PermohonanMagang extends CreateTemplate
{
    public static ?string $view = 'surat.permohonan-magang';
    
    public static function getSchema(): array
    {
        $helperText = "Contoh:<br>Yth. Kepala <br>
                    Dinas Komunikasi dan Informatika Kabupaten Sleman,<br>
                    Jl. Parasamya No. 1, Beran, Tridadi, Kec. Sleman,<br>
                    Kabupaten Sleman, Daerah Istimewa Yogyakarta 55511";
                    
        return [
            Section::make([
                Textarea::make('penerima')
                    ->rows(4)
                    ->extraInputAttributes(['style' => 'resize:none'])
                    ->helperText(new HtmlString($helperText))
                    ->required()
            ]),
            Section::make([
                TextInput::make('tempat')
                    ->minLength(2)
                    ->helperText('Contoh: Dinas Komunikasi dan Informatika Kabupaten Sleman')
                    ->required(),
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
                DatePicker::make('tgl_mulai')
                    ->label('Tanggal Mulai')
                    ->before('tgl_selesai')
                    ->required(),
                DatePicker::make('tgl_selesai')
                    ->label('Tanggal Selesai')
                    ->required(),
            ])
                ->columns(2)
        ];
    }
}
