<?php

namespace App\Constants;

class Motivo
{
    public const SOLD = 1;
    public const DAMAGED = 2;

    public static function exists($motivo)
    {
        return in_array($motivo, [self::SOLD, self::DAMAGED]);
    }

    public static function match($motivo)
    {
        $motivoReadables = [
            self::SOLD => 'Por Venta',
            self::DAMAGED => 'Por Deterioro'
        ];
        return $motivoReadables[$motivo];
    }
}
