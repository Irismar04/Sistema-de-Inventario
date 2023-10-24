<?php

namespace App\Controllers;

use App\Models\Divisa;
use App\Models\Salida;
use App\Models\Producto;

class SalidaController extends Controller
{
    public function index()
    {
        $modelo = new Salida();
        $salidas = $modelo->todos();
        $divisa = (new Divisa())->ultima();
        return parent::ver('salidas/index', [
            'salidas' => $salidas,
            'divisa' => $divisa
        ]);
    }

    public function crear()
    {
        $modelo = new Producto();
        $productos = $modelo->todosActivos();

        return parent::ver('salidas/crear', ['productos' => $productos]);
    }

    public function guardar()
    {
        $modelo = new Salida();
        $success = $modelo->guardar($_POST);

        if($success) {
            parent::redirigir('salidas?success=crear');
        } else {
            parent::redirigir('salidas?error=crear');
        }
    }
}
