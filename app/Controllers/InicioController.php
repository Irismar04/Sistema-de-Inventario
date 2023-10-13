<?php

namespace App\Controllers;

use App\Models\Users;

class InicioController extends Controller
{
    public function mostrar()
    {
        $modelo = new Users();
        $usuarios = $modelo->todos();
        return parent::ver('index', [
            'nombre' => 'Inversiones Zormar',
            'usuarios' => $usuarios
        ], 'Inversiones Zormar - Dashboard');
    }
}
