<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Number;
use Illuminate\Support\Str;

class IpkInput extends Number
{
    protected function setUp()
    {
        parent::setUp();

        $this->defaultStep(0.01)
            ->min(0)
            ->max(4)
            ->decimals(2)
            ->placeholder('0.00 - 4.00')
            ->append('IPK');
    }

    public function validate()
    {
        return parent::validate()
            ->rules('numeric', 'min:0', 'max:4');
    }

    public function resolveName()
    {
        return Str::kebab($this->name);
    }
}
