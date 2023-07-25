<?php

namespace App\Controllers;

use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        $modelo = new Categoria();
        $categorias = $modelo->todos();
        return parent::ver('categorias/index', ['categorias' => $categorias]);
    }

    public function crear()
    {
        return parent::ver('categorias/crear');
    }

    public function editar()
    {
        $modelo = new Categoria();
        $categoria = $modelo->uno($_GET['id']);
        return parent::ver('categorias/editar', ['categoria' => $categoria]);
    }

    public function guardar()
    {
        $modelo = new Categoria();
        $modelo->guardar($_POST);

        parent::redirigir('categorias');
    }

    public function actualizar()
    {
        $modelo = new Categoria();
        $modelo->actualizar($_POST);

        parent::redirigir('categorias');
    }

    public function destruir()
    {
        $modelo = new Categoria();
        $modelo->destruir($_GET['id']);

        parent::redirigir('categorias');
    }
}
