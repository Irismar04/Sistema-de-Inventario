<?php

namespace App\Controllers;

class UsuarioController extends Controller
{
    public function mostrar()
    {
        return parent::ver('Usuario');
    }
}
