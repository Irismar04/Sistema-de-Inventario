<?php

namespace App\Controllers;

use App\Constants\Status;
use App\Models\Rol;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index()
    {
        $modelo = new Usuario();
        $usuarios = $modelo->todosActivos();
        return parent::ver('usuarios/index', ['usuarios' => $usuarios]);
    }

    public function inactivos()
    {
        $modelo = new Usuario();
        $usuarios = $modelo->todosInactivos();
        return parent::ver('usuarios/index', ['usuarios' => $usuarios]);
    }

    public function crear()
    {
        $modelo = new Rol();
        $roles = $modelo->todos();

        return parent::ver('usuarios/crear', ['roles' => $roles]);
    }

    public function mostrar()
    {
        $modelo = new Usuario();
        $usuario = $modelo->uno($_GET['id']);

        return parent::ver('usuarios/datos', [
            'usuario' => $usuario,
        ]);
    }

    public function editar()
    {
        $modelo = new Usuario();
        $usuario = $modelo->uno($_GET['id']);

        $modeloDos = new Rol();
        $roles = $modeloDos->todos();

        return parent::ver('usuarios/editar', [
            'usuario' => $usuario,
            'roles' => $roles,
        ]);
    }

    public function guardar()
    {
        $modelo = new Usuario();
        $success = $modelo->guardar($_POST);

        if($success) {
            parent::redirigir('usuarios?success=crear');
        } else {
            parent::redirigir('usuarios?error=crear');
        }
    }

    public function actualizar()
    {
        $modelo = new Usuario();
        $modelo->actualizar($_POST);

        parent::redirigir('usuarios?success=editar');
    }

    public function cambiarEstado()
    {
        $modelo = new Usuario();
        [$success, $estado] = $modelo->cambiarEstado($_POST);

        if($success) {
            if($estado == Status::ACTIVE) {
                parent::redirigir('usuarios?success=activado');
            } elseif($estado == Status::INACTIVE) {
                parent::redirigir('usuarios?success=desactivado');
            } else {
                parent::redirigir('usuarios?error=desconocido');
            }
        } else {
            parent::redirigir('usuarios?error=estado');
        }
    }


    public function cambiarContrasena()
    {
        $modelo = new Usuario();
        $usuario = $modelo->uno($_GET['id']);
        return parent::ver('usuarios/pass', [
            'usuario' => $usuario,
        ], 'Inversiones Zormar - Cambiar Contraseña');
    }

    public function guardarCambiarContrasena()
    {
        $modelo = new Usuario();
        $success = $modelo->cambiarContrasena($_POST);

        if($success) {
            parent::redirigir('usuarios?success=password');
        } else {
            parent::redirigir('usuarios?error=password');
        }
    }

    public function destruir()
    {
        $modelo = new Usuario();
        $modelo->softDelete($_GET['id']);

        parent::redirigir('usuarios?success=borrar');
    }
}
