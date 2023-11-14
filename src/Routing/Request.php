<?php

namespace Inventario\Routing;

class Request
{
    public $method;
    public $path;

    public function __construct($uri, $method)
    {
        $uri = parse_url($uri);
        $this->method = $method;
        $this->setPath($uri['path']);
    }

    public function setPath(string $uri)
    {
        if (strlen($uri) != 1) {
            $uri =  rtrim($uri, "/");
        }
        $this->path = $uri;
    }

}
