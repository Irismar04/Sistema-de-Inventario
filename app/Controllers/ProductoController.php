<?php

namespace App\Controllers;

class ProductoController extends Controller
{
    public function index()
    {
        return parent::ver('categorias/index', []);
    }

    public function crear()
    {
        return parent::ver('categorias/crear');
    }

    public function editar()
    {
        return parent::ver('categorias/editar', []);
    }
}
