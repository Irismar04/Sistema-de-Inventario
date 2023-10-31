<?php

namespace App\Constants;

class Status
{
    public const INACTIVE = 0;
    public const ACTIVE = 1;

    public static function exists($status)
    {
        return in_array($status, [self::ACTIVE, self::INACTIVE]);
    }

    public static function match($status)
    {
        $statusReadables = [
            self::ACTIVE => 'Activo',
            self::INACTIVE => 'Inactivo'
        ];
        return $statusReadables[$status];
    }
}
