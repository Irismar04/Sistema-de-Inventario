<?php

namespace App\Models;

use Inventario\Database\Model as BaseModel;

abstract class Model extends BaseModel
{
    public function redirigir($ruta)
    {
        header("Location: /sistema-de-inventario/public/". $ruta);
        exit;
    }
    abstract public function guardar($datosForm);

    abstract public function actualizar($datosForm);

    abstract public function destruir($id);
}
