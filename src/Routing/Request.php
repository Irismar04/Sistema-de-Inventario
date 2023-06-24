<?php 

namespace Inventario\Routing;

class Request 
{
    public array $uri;
    public string $method;
    public string $path;

    public function __construct($uri, $method){
        $this->uri = parse_url($uri);
        $this->method = $method;
        $this->setPath($this->uri['path']);
    }

    public function setPath(string $uri): void 
    {
        if (strlen($uri) != 1) {
            $uri =  rtrim($uri, "/");
        }
        $this->path =$uri;
    }

}