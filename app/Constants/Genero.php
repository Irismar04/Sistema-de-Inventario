<?php

namespace App\Constants;

class Genero
{
    public const MALE = "M";
    public const FEMALE = "F";

    public static function exists($genero)
    {
        return in_array($genero, [self::MALE, self::FEMALE]);
    }

    public static function match($genero)
    {
        $generoReadables = [
            self::MALE => 'Masculino',
            self::FEMALE => 'Femenino'
        ];
        return $generoReadables[$genero];
    }
}
