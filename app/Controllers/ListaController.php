<?php

namespace App\Controllers;

class ListaController 
{
    public function mostrar () 
    {
        require dirname(__DIR__) . '/Views/Lista.view.php';
    }
}