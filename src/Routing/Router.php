<?php


namespace Inventario\Routing;

use Inventario\Routing\HttpMethod;

class Router 
{
    public array $rutas;


    public function correr ($request)
    {
        $accion = $this->rutas[$request->method][$request->path] ?? null;
        if ($accion == null) {
            throw new HttpNotFoundException();

        }
        if (is_array($accion)) {
            return $this->llamarMetodoEnClase($accion);
        }
        throw new HttpNotFoundException();
    }

    private function crearRuta ($metodo, $uri, $accion)

    {
        $this->rutas[$metodo][$uri] = $accion;

    }
        private function llamarMetodoEnClase($accion)
        {
            [$clase, $metodo] = $accion;

            if (class_exists($clase)) 
            {
                 $controller = $clase;
                if (method_exists($clase, $metodo))
                {
                    return call_user_func_array([new $controller, $metodo], []);
                }
            }
        }

    public function get($uri, $accion)

    {
        return $this->crearRuta(HttpMethod:: GET, $uri, $accion);
    }

    public function post($uri, $accion)

    {
        return $this->crearRuta(HttpMethod:: POST, $uri, $accion);
    }

    public function put($uri, $accion)

    {
        return $this->crearRuta(HttpMethod:: PUT, $uri, $accion);
    }

    public function PATCH($uri, $accion)

    {
        return $this->crearRuta(HttpMethod:: PATCH, $uri, $accion);
    }

    public function delete($uri, $accion)

    {
        return $this->crearRuta(HttpMethod:: DELETE, $uri, $accion);
    }

    
}
