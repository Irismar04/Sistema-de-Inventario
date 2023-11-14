<?php

namespace Inventario\Database;

use Inventario\App;

abstract class Model
{
    /**
     * Parametro de base de datos
     * @var \PDO
     */
    protected $db;

    public function __construct()
    {
        $this->db = App::db();
    }

    public function redirigir($ruta)
    {
        $carpetas = str_replace("/index.php", "", $_SERVER['PHP_SELF']);
        header("Location: {$carpetas}/{$ruta}");
        exit;
    }
}
