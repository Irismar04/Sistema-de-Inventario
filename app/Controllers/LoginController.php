<?php

namespace App\Controllers;

use Inventario\Database\Login;
use Inventario\Routing\Request;

class LoginController extends Controller
{
    public function mostrar()
    {
        $request = new Request($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
        $path = $request->path;
        if($path === "/sistema-de-inventario/public" && isset($_SESSION['usuario'])) {
            parent::redirigir('dashboard');
        }
        return parent::ver('inicio', [], '', null);
    }

    public function login()
    {
        $login = new Login();

        $logeado = $login->iniciarSesion($_POST);

        if(!$logeado) {
            parent::redirigir('?status=error');
        } else {
            parent::redirigir('dashboard');
        }
    }

    public function logout()
    {
        $login = new Login();
        $login->cerrarSesion();
        parent::redirigir('dashboard');
    }
}
