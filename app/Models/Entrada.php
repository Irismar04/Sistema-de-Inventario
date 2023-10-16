<?php

namespace App\Models;

class Entrada extends Model
{
    protected $tabla = 'detalle_entrada';
    protected $id = 'id_detalle_e';

    protected $relaciones = [
        'producto' => 'id_producto',
        'entrada' => 'id_entrada'
    ];

    public function actualizar($datosForm)
    {
    }

    public function destruir($id)
    {
    }

    public function guardar($datosForm)
    {
    }
}
