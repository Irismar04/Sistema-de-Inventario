<?php
declare(strict_types=1);
namespace Inventario\Routing;

class Router 
{
    public array $rutas;

    public function get(string $uri, mixed $action): void
    {
        $this->rutas['GET'][$uri] = $action;
    }
    public function correr()
    {
        $metodo = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        $accion = $this->rutas[$metodo][$uri];

        $accion();

    }
    
}
