<?php

namespace App\Filament\Resources\TemplateResource\Pages;

use App\Filament\Resources\TemplateResource;
use Filament\Resources\Pages\ListRecords;

class ListTemplates extends ListRecords
{
    protected static string $resource = TemplateResource::class;

    public function getHeading(): string
    {
        $user = auth()->user();
        return "Halo, {$user->name}";
    }

    public function getSubheading(): string
    {
        return 'Pilih salah satu template di bawah ini untuk mulai membuat surat';
    }
}
