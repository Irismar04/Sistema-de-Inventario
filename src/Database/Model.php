<?php

namespace Inventario\Database;

use Inventario\App;

use PDO;

abstract class Model
{
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
