<?php

namespace App\Controllers;

use App\Constants\Status;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        $modelo = new Categoria();
        $categorias = $modelo->todosSinBorrar();
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

        parent::redirigir('categorias?success=crear');
    }

    public function actualizar()
    {
        $modelo = new Categoria();
        $modelo->actualizar($_POST);

        parent::redirigir('categorias?success=editar');
    }

    public function cambiarEstado()
    {
        $modelo = new Categoria();
        [$success, $estado] = $modelo->cambiarEstado($_POST);

        if($success) {
            if($estado == Status::ACTIVE) {
                parent::redirigir('categorias?success=activado');
            } elseif($estado == Status::INACTIVE) {
                parent::redirigir('categorias?success=desactivado');
            } else {
                parent::redirigir('categorias?error=desconocido');
            }
        } else {
            parent::redirigir('categorias?error=estado');
        }
    }

    public function destruir()
    {
        $modelo = new Categoria();

        $success = $modelo->softDelete($_GET['id']);

        if($success) {
            parent::redirigir('categorias?success=borrar');
        } else {
            parent::redirigir('categorias?error=borrar');
        }
    }
}
