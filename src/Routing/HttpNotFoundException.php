<?php 

namespace Inventario\Routing;

use Exception;

class HttpNotFoundException extends Exception
{
    protected $message = "Pagina no encontrada";
    protected $code = 404;
}
