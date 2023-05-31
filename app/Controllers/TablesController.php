<?php

namespace App\Controllers;

class TablesController 
{
    public function mostrar () 
    {
        require dirname(__DIR__) . '/Views/Tables.view.php';
    }
}