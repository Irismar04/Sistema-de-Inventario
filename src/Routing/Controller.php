<?php

namespace Inventario\Routing;

use Inventario\View\View;
use Inventario\View\ViewEngine;

class Controller
{
    public $viewEngine;

    public function __construct()
    {
        $this->viewEngine = new ViewEngine();
    }
    public function ver($file, $params = [], $titulo = 'Inversiones Zormar', $layout = "default")
    {
        $view = new View($file, $params, $titulo, $layout);
        return $this->viewEngine->render($view);
    }
}
