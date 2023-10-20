<?php

namespace App\Models;

use App\Traits\Desactivable;

class Usuario extends Model
{
    use Desactivable;

    protected $tabla = 'usuario';
    protected $id = 'id_usuario';

    protected $relaciones = [
        'rol' => 'id_rol',
        'datos' => 'id_usuario'
    ];

    public function guardar($datosForm)
    {

    }

    public function actualizar($datosForm)
    {

    }

    public function destruir($id)
    {

    }
}
