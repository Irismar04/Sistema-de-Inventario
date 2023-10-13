<?php

namespace Inventario\Routing;

class Ruta
{
    public $accion;
    public $middleware = null;

    public function __construct($accion)
    {
        $this->accion = $accion;
    }

    public function auth($middleware = 'auth')
    {
        $this->middleware = $middleware;
        return $this;
    }
}
