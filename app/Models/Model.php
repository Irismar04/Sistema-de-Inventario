<?php

namespace App\Models;

use Inventario\Database\Model as BaseModel;

abstract class Model extends BaseModel
{
    abstract public function guardar($datosForm);

    abstract public function actualizar($datosForm);

    abstract public function destruir($id);
}
