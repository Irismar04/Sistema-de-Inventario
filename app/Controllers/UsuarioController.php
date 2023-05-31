<?php

namespace App\Controllers;

class UsuarioController 
{
    public function mostrar () 
    {
        require dirname(__DIR__) . '/Views/Usuario.view.php';
    }
}