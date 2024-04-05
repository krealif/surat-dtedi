<?php

namespace App\Forms\Components;

use Filament\Forms\Components\TextInput;

class NimInput extends TextInput
{
    public function format(): static
    {
        return $this
            ->regex('/^\d{2}\/\d{6}\/[A-Z]{2}\/\d{5}$/');
    }
}
