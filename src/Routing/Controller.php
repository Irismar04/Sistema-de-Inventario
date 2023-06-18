<?php

namespace Inventario\Routing;

use Inventario\View\ViewEngine;

class Controller 
{
    public $viewEngine;
    
    public function __construct()
    {
    $this->viewEngine = new ViewEngine();    
    }
    public function ver ($nombre)
    {
        return $this->viewEngine->render($nombre);
    }
}




