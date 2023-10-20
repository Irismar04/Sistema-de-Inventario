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
        header("Location: /sistema-de-inventario/public/". $ruta);
        exit;
    }
}
