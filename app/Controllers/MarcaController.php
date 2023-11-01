<?php

namespace App\Controllers;

use App\Constants\Status;
use App\Models\Marca;

class MarcaController extends Controller
{
    public function index()
    {
        $modelo = new Marca();
        $marcas = $modelo->todosActivos();
        return parent::ver('marcas/index', ['marcas' => $marcas]);
    }

    public function inactivos()
    {
        $modelo = new Marca();
        $marcas = $modelo->todosInactivos();
        return parent::ver('marcas/index', ['marcas' => $marcas]);
    }

    public function crear()
    {
        return parent::ver('marcas/crear');
    }

    public function editar()
    {
        $modelo = new Marca();
        $marca = $modelo->uno($_GET['id']);
        return parent::ver('marcas/editar', ['marca' => $marca]);
    }

    public function guardar()
    {
        $modelo = new Marca();
        $modelo->guardar($_POST);

        parent::redirigir('marcas?success=crear');
    }

    public function actualizar()
    {
        $modelo = new Marca();
        $modelo->actualizar($_POST);

        parent::redirigir('marcas?success=editar');
    }

    public function cambiarEstado()
    {
        $modelo = new Marca();
        [$success, $estado] = $modelo->cambiarEstado($_POST);

        if($success) {
            if($estado == Status::ACTIVE) {
                parent::redirigir('marcas/inactivos?success=activado');
            } elseif($estado == Status::INACTIVE) {
                parent::redirigir('marcas?success=desactivado');
            } else {
                parent::redirigir('marcas?error=desconocido');
            }
        } else {
            parent::redirigir('marcas?error=estado');
        }
    }

    public function destruir()
    {
        $modelo = new Marca();
        $success = $modelo->softDelete($_GET['id']);

        if($success) {
            parent::redirigir('marcas?success=borrar');
        } else {
            parent::redirigir('marcas?error=borrar');
        }
    }

}
