<?php

namespace App\Enums;

enum Major: string
{
    case TRPL = 'Teknologi Rekayasa Perangkat Lunak';
    case TRI = 'Teknologi Rekayasa Internet';
    case TRE = 'Teknologi Rekayasa Elektro';
    case TRIK = 'Teknologi Rekayasa Instrumentasi dan Kontrol';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'name', 'value');
    }
}
