<?php

namespace App\Controllers;

use App\Models\Categoria;
use App\Models\Divisa;
use App\Models\Entrada;
use App\Models\Producto;

class EntradaController extends Controller
{
    public function index()
    {
        $modelo = new Entrada();
        $entradas = $modelo->todos();
        $divisa = (new Divisa())->ultima();

        return parent::ver('entradas/index', [
            'entradas' => $entradas,
            'divisa' => $divisa
        ]);
    }

    public function crear()
    {
        $modelo = new Categoria();
        $categorias = $modelo->todosActivos();

        return parent::ver('entradas/crear', ['categorias' => $categorias]);
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
