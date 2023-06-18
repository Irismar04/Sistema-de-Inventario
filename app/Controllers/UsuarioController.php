<?php

namespace App\Controllers;

class UsuarioController extends Controller
{
    public function mostrar() 
    {
        return $this->ver('Usuario');
    }
}