<?php

namespace App\Controllers;

use App\Models\Entrada;
use App\Models\Producto;

class EntradaController extends Controller
{
    public function index()
    {
        $modelo = new Entrada();
        $entradas = $modelo->todos();
        return parent::ver('entradas/index', ['entradas' => $entradas]);
    }

    public function crear()
    {
        $modelo = new Producto();
        $productos = $modelo->todos();

        return parent::ver('entradas/crear', ['productos' => $productos]);
    }

    public function guardar()
    {
        $modelo = new Entrada();
        $success = $modelo->guardar($_POST);

        if($success) {
            parent::redirigir('entradas?success=crear');
        } else {
            parent::redirigir('entradas?error=crear');
        }
    }
}
