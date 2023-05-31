<?php

namespace App\Controllers;

class InicioController 
{
    public function mostrar () 
    {
        require dirname(__DIR__) . '/Views/Inicio.view.php';
    }
}