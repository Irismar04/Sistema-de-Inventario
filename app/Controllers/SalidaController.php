<?php

namespace App\Controllers;

use App\Models\Categoria;
use App\Models\Divisa;
use App\Models\Salida;
use App\Models\Producto;

class SalidaController extends Controller
{
    public function index()
    {
        $modelo = new Salida();
        $salidas = $modelo->todos();
        return parent::ver('salidas/index', [
            'salidas' => $salidas,
        ]);
    }

    public function crear()
    {
        $modelo = new Categoria();
        $categorias = $modelo->todosActivos();

        return parent::ver('salidas/crear', ['categorias' => $categorias]);
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
