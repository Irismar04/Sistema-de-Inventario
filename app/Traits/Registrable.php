<?php

namespace App\Traits;

use App\Models\Historial;

trait Registrable
{
    public function registrar($accion, $tabla = null)
    {
        $modelo = new Historial();
        $modelo->guardar([
            'accion' => $accion,
            'tabla' => $tabla != null ? $tabla : $this->tabla
        ]);
    }
}
