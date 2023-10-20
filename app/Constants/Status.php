<?php

namespace App\Constants;

class Status
{
    public const ACTIVE = 1;
    public const INACTIVE = 2;
    public const DELETED = 3;

    public static function exists($status)
    {
        return in_array($status, [self::ACTIVE, self::DELETED, self::INACTIVE]);
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
