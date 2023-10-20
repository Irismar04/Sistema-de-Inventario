<?php

namespace App\Controllers;

use App\Constants\Status;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {

        $modelo = new Producto();
        $productos = $modelo->todosSinBorrar();
        return parent::ver('productos/index', ['productos' => $productos]);
    }

    public function crear()
    {
        $modelo = new Categoria();
        $categorias = $modelo->todosActivos();


        $modeloDos = new Marca();
        $marcas = $modeloDos->todosActivos();
        return parent::ver('productos/crear', ['categorias' => $categorias, 'marcas' => $marcas]);
    }

    public function editar()
    {
        $modelo = new Producto();
        $modeloDos = new Categoria();
        $modeloTres = new Marca();
        $producto = $modelo->uno($_GET['id']);
        $categorias = $modeloDos->todosActivos();
        $marcas = $modeloTres->todosActivos();
        return parent::ver('productos/editar', [
            'producto' => $producto,
            'categorias' => $categorias,
            'marcas' => $marcas
        ]);
    }

    public function guardar()
    {
        $modelo = new Producto();
        $modelo->guardar($_POST);

        parent::redirigir('productos?success=crear');
    }

    public function actualizar()
    {
        $modelo = new Producto();
        $modelo->actualizar($_POST);

        parent::redirigir('productos?success=editar');
    }

    public function cambiarEstado()
    {
        $modelo = new Producto();
        [$success, $estado] = $modelo->cambiarEstado($_POST);

        if($success) {
            if($estado == Status::ACTIVE) {
                parent::redirigir('productos?success=activado');
            } elseif($estado == Status::INACTIVE) {
                parent::redirigir('productos?success=desactivado');
            } else {
                parent::redirigir('productos?error=desconocido');
            }
        } else {
            parent::redirigir('productos?error=estado');
        }
    }

    public function destruir()
    {
        $modelo = new Producto();
        $modelo->softDelete($_GET['id']);

        parent::redirigir('productos?success=borrar');
    }
}
