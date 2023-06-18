<?php

namespace App\Controllers;

class IndexController  extends Controller 
{
    public function mostrar() 
    {
        return $this->ver('Index');
    }
}
