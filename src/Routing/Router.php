<?php

namespace Inventario\Routing;

class Router
{
    public $rutas;
    private $carpetas;

    public function __construct()
    {
        $this->carpetas = str_replace("/index.php", "", $_SERVER['PHP_SELF']);
    }

    public function authMiddleware($path, $middleware)
    {
        if (!isset($_SESSION['usuario'])) {
            header("Location: {$this->carpetas}/");
            exit;
        } else {
            if($path === "{$this->carpetas}/") {
                header("Location: {$this->carpetas}/dashboard");
                exit;
            }

            if($middleware == 'admin' && $_SESSION['usuario']['nom_rol'] != 'Administrador') {
                header("Location: {$this->carpetas}/dashboard");
                exit;
            }
        }
    }

    public function correr($request)
    {
        $ruta = $this->rutas[$request->method][$request->path] ?? null;
        if ($ruta == null) {
            throw new HttpNotFoundException();
        }
        if (is_callable($ruta->accion)) {
            return call_user_func($ruta->accion);
        }
        if (is_array($ruta->accion)) {
            if($ruta->middleware != null) {
                $this->authMiddleware($request->path, $ruta->middleware);
            }
            return $this->llamarMetodoEnClase($ruta->accion);
        }
        throw new HttpNotFoundException();
    }

    private function crearRuta($metodo, $uri, $accion)
    {
        if($uri == '/' && $this->carpetas != '') {
            $ruta = $this->carpetas;
        } else {
            $ruta = $this->carpetas . $uri;
        }
        $clase = new Ruta($accion);
        $this->rutas[$metodo][$ruta] = $clase;

        return $clase;
    }

    private function llamarMetodoEnClase($accion)
    {
        [$clase, $metodo] = $accion;
        if (class_exists($clase)) {
            $controller = new $clase();
            if (method_exists($clase, $metodo)) {
                return $controller->$metodo();
            } else {
                throw new HttpNotFoundException();
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

    public function controlador($uri, $controller, $middleware = null)
    {
        // Index
        $this->get($uri, [$controller, 'index'])->auth($middleware);

        // Index para inactivos
        $this->get("$uri/inactivos", [$controller, 'inactivos'])->auth($middleware);

        // Create
        $this->get("$uri/crear", [$controller, 'crear'])->auth($middleware);

        // Store
        $this->post($uri, [$controller, 'guardar'])->auth($middleware);

        // Show
        $this->get("$uri/mostrar", [$controller, 'mostrar'])->auth($middleware);

        // Edit
        $this->get("$uri/editar", [$controller, 'editar'])->auth($middleware);

        // Update
        $this->post("$uri/actualizar", [$controller, 'actualizar'])->auth($middleware);

        // Delete
        $this->get("$uri/destruir", [$controller, 'destruir'])->auth($middleware);
    }
}
