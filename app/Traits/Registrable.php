<?php

namespace App\Traits;

use App\Models\Historial;

trait Registrable
{
    public function registrar($accion)
    {
        $modelo = new Historial();
        $modelo->guardar([
            'accion' => $accion,
            'tabla' => $this->tabla
        ]);
    }
}
