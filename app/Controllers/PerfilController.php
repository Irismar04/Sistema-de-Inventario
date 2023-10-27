<?php

namespace App\Controllers;

use App\Models\Rol;
use App\Models\Usuario;

class PerfilController extends Controller
{
    public function editarPerfil()
    {
        $id = $_SESSION['usuario']['id_usuario'];
        $modelo = new Usuario();
        $usuario = $modelo->uno($id);

        $modeloDos = new Rol();
        $roles = $modeloDos->todos();

        return parent::ver('perfil/editar', [
            'usuario' => $usuario,
            'roles' => $roles,
        ]);
    }

    public function actualizar()
    {
        $modelo = new Usuario();
        $modelo->actualizar($_POST);

        parent::redirigir('dashboard?success=perfil-editar');
    }

    public function cambiarContrasena()
    {
        $id = $_SESSION['usuario']['id_usuario'];
        $usuario = (new Usuario())->uno($id);
        return parent::ver('perfil/pass', [
            'usuario' => $usuario,
        ]);
    }

    public function guardarCambiarContrasena()
    {
        $modelo = new Usuario();
        $success = $modelo->cambiarContrasenaDePerfil($_POST);

        if ($success) {
            return parent::redirigir('dashboard?success=perfil-contrasena');
        } else {
            return parent::redirigir('perfil/cambiar-contrasena?error=contrasena');
        }
    }
}
