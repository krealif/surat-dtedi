<?php

namespace App\Filament\Resources\TemplateResource\Templates;

abstract class CreateTemplate
{
    public static ?string $docView = null;

    abstract public static function getSchema(): array;
}
