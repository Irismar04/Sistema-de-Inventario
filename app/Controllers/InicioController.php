<?php

namespace App\Controllers;

class InicioController extends Controller
{
    public function mostrar() 
    {
        return $this->ver('Inicio');
    }
}