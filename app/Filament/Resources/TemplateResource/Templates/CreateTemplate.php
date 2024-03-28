<?php

namespace App\Filament\Resources\TemplateResource\Templates;

abstract class CreateTemplate {
  protected static ?string $document = null;

  abstract public static function getSchema(): array;
}