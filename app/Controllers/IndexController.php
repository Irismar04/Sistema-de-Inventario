<?php

namespace App\Controllers;

use App\Models\Users;

class IndexController extends Controller
{
    public function mostrar()
    {
        $modelo = new Users();
        $usuarios = $modelo->todos();
        return $this->ver('index', [
            'nombre' => 'Inversiones Zormar',
            'usuarios' => $usuarios
        ], 'Inversiones Zormar - Dashboard');
    }
}
