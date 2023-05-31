<?php

namespace App\Controllers;

class IndexController 
{
    public function mostrar () 
    {
        require dirname(__DIR__) . '/Views/index.view.php';
    }
}
