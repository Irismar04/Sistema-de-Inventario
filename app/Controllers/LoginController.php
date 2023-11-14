<?php

namespace App\Controllers;

use App\Models\Usuario;
use Inventario\Routing\Request;

class LoginController extends Controller
{
    public function index()
    {
        $request = new Request($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
        $path = $request->path;
        $path =  rtrim($path, "/");
        $carpetas = str_replace("/index.php", "", $_SERVER['PHP_SELF']);
        if($path === "{$carpetas}" && isset($_SESSION['usuario'])) {
            parent::redirigir('dashboard');
        }
        return parent::ver('inicio', [], '', null);
    }

    public function login()
    {
        $login = new Usuario();

        $logeado = $login->iniciarSesion($_POST);

        if(!$logeado) {
            parent::redirigir('?status=error');
        } else {
            parent::redirigir('dashboard');
        }
    }

    public function logout()
    {
        $login = new Usuario();
        $login->cerrarSesion();
        parent::redirigir('');
    }
}
