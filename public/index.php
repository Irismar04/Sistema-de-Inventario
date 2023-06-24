<?php

require dirname(__DIR__) . '/vendor/autoload.php';
require dirname(__DIR__) . '/routes/rutas.php';

use Inventario\Routing\Request;
use Inventario\View\View;
use Inventario\View\ViewEngine;


$viewEngine = new ViewEngine();

try {
    $request = new Request($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
    echo $router->correr($request);

} catch (\Inventario\Routing\HttpNotFoundException $e) {
    http_response_code(404);
    $view = new View("errors/404", ['message' => $e->getMessage(), 'code' => $e->getCode()]);
    echo $viewEngine->render($view);
}
