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

        return parent::ver('entradas/index', [
            'entradas' => $entradas,
        ]);
    }

    public function reportes()
    {
        return parent::ver('entradas/reportes');
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

    public function revertir()
    {
        $modelo = new Entrada();

        $success = $modelo->destruir($_POST);

        if($success) {
            parent::redirigir('entradas?success=borrar');
        } else {
            parent::redirigir('entradas?error=borrar');
        }
    }

    public function entradasPorFechaJson()
    {
        $modelo = new Entrada();
        $entradas = $modelo->todosPorFecha($_GET);

        return json_encode($entradas);
    }
}
