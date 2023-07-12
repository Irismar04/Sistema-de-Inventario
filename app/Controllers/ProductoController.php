<?php

namespace App\Controllers;

class ProductoController extends Controller
{
    public function mostrar()
    {
        return $this->ver('Lista');
    }
}
