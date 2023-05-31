<?php

namespace App\Controllers;

class AnadirController 
{
    public function mostrar () 
    {
        require dirname(__DIR__) . '/Views/Anadir.view.php';
    }
}