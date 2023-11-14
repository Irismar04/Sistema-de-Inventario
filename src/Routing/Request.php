<?php

namespace Inventario\Routing;

class Request
{
    public $method;
    public $path;

    public $carpetas;

    public function __construct($uri, $method)
    {
        $this->carpetas = str_replace("/index.php", "", $_SERVER['PHP_SELF']);

        $uri = parse_url($uri);

        $this->method = $method;

        if(isset($uri['path'])) {
            $this->setPath($uri['path']);
        } else {
            $this->setPath('/');
        }
    }

    public function setPath($uri)
    {
        $uri = str_replace($this->carpetas, '', $uri);
        if (strlen($uri) != 1) {
            $uri =  rtrim($uri, "/");
        }
        $this->path = $uri;
    }

}
