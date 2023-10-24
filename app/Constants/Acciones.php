<?php

namespace App\Constants;

class Acciones
{
    public const CREATE = 1;
    public const UPDATE = 2;
    public const DELETE = 3;
    public const ACTIVATE = 4;
    public const DEACTIVATE = 5;

    public static function match($genero)
    {
        $generoReadables = [
            self::CREATE => 'Se creó un registro',
            self::UPDATE => 'Se actualizó un registro',
            self::DELETE => 'Se eliminó un registro',
            self::ACTIVATE => 'Se activó un registro',
            self::DEACTIVATE => 'Se desactivó un registro',
        ];

        return $generoReadables[$genero];
    }
}
