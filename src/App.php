<?php

namespace Inventario;

use Inventario\View\View;
use Inventario\Routing\Request;
use Inventario\View\ViewEngine;
use Inventario\Routing\HttpNotFoundException;
use Inventario\Database\DB;

class App
{
    private static $db;
    protected $router;
    protected $viewEngine;
    protected $basePath;

    public function __construct($router, $config, $basePath)
    {
        $this->router = $router;
        $this->viewEngine = new ViewEngine($basePath);
        $this->basePath = $basePath;
        static::$db = new DB($config ?? []);
    }

    public static function db()
    {
        return static::$db;
    }

    public function correr(): void
    {
        try {
            $request = new Request($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
            echo $this->router->correr($request);
        } catch (HttpNotFoundException $e) {
            http_response_code(404);
            $view = new View("errors/404", ['message' => $e->getMessage(), 'code' => $e->getCode()], '404', null);
            echo $this->viewEngine->render($view);
        }
    }
}
