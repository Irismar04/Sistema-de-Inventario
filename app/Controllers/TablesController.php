<?php

namespace App\Controllers;

class TablesController extends Controller
{
    public function mostrar() 
    {
        return parent::ver('Tables');
    }
}