<?php

namespace Inventario\Routing;

class Router
{
    public $rutas;
    private $carpetas = '/sistema-de-inventario/public';

    public function correr($request)
    {
        $accion = $this->rutas[$request->method][$request->path] ?? null;
        if ($accion == null) {
            throw new HttpNotFoundException();
        }
        if (is_callable($accion)) {
            return call_user_func($accion);
        }
        if (is_array($accion)) {
            return $this->llamarMetodoEnClase($accion);
        }
        throw new HttpNotFoundException();
    }

    private function crearRuta($metodo, $uri, $accion)
    {
        if($uri != '/') {
            $ruta = $this->carpetas . $uri;
        } else {
            $ruta = $this->carpetas;
        }
        $this->rutas[$metodo][$ruta] = $accion;
    }

    private function llamarMetodoEnClase($accion)
    {
        [$clase, $metodo] = $accion;
        if (class_exists($clase)) {
            $controller = new $clase();
            if (method_exists($clase, $metodo)) {
                return call_user_func_array([$controller, $metodo], []);
            }
        }
    }

    public function get($uri, $accion)
    {
        return $this->crearRuta(HttpMethod::GET, $uri, $accion);
    }

    public function post($uri, $accion)
    {
        return $this->crearRuta(HttpMethod::POST, $uri, $accion);
    }

    public function put($uri, $accion)
    {
        return $this->crearRuta(HttpMethod::PUT, $uri, $accion);
    }

    public function PATCH($uri, $accion)
    {
        return $this->crearRuta(HttpMethod::PATCH, $uri, $accion);
    }

    public function delete($uri, $accion)
    {
        return $this->crearRuta(HttpMethod::DELETE, $uri, $accion);
    }

    public function controlador($uri, $controller)
    {
        // Index
        $this->get($uri, [$controller, 'index']);

        // Create
        $this->get("$uri/create", [$controller, 'create']);

        // Store
        $this->post($uri, [$controller, 'store']);

        // Show
        $this->get("$uri/show", [$controller, 'show']);

        // Edit
        $this->get("$uri/edit", [$controller, 'edit']);

        // Update
        $this->patch($uri, [$controller, 'update']);

        // Delete
        $this->delete($uri, [$controller, 'update']);
    }
}
