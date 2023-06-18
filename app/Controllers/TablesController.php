<?php

namespace App\Controllers;

class TablesController extends Controller
{
    public function mostrar() 
    {
        return $this->ver('Tables');
    }
}