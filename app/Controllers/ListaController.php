<?php

namespace App\Controllers;

class ListaController extends Controller
{
    public function mostrar() 
    {
        return $this->ver('Lista');
    }
}