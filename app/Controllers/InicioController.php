<?php

namespace App\Controllers;

use Inventario\Database\Login;

class InicioController extends Controller
{
    public function mostrar()
    {
        return parent::ver('inicio', [], '', null);
    }

    public function login($datos)
    {
        $login = new Login();

        $logeado = $login->iniciarSesion($datos);

        if(!$logeado) {
            header("Location: /sistema-de-inventario/public/login");
        } else {
            header("Location: /sistema-de-inventario/public/");
        }
    }

    public function logout()
    {
        $login = new Login();
        $login->cerrarSesion();
        header("Location: /sistema-de-inventario/public/login");
    }
}
