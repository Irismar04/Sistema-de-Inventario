<?php

namespace Inventario\Routing;

use Inventario\View\View;
use Inventario\View\ViewEngine;

class Controller
{
    public function ver($file, $params = [], $titulo = 'Inversiones Zormar', $layout = "default")
    {
        $viewEngine = new ViewEngine();
        $view = new View($file, $params, $titulo, $layout);
        return $viewEngine->render($view);
    }

    public function redirigir($ruta)
    {
        header("Location: /sistema-de-inventario/public/{$ruta}");
        exit;
    }
}
