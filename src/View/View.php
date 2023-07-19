<?php

namespace Inventario\View;

class View
{
    public $file;
    public $data;
    public $layout;
    public $titulo;
    public function __construct(
        $file,
        $data = [],
        $titulo = '',
        $layout = 'default'
    ) {
        $this->file = $file;
        $this->data = $data;
        $this->titulo = $titulo;
        $this->layout = $layout;
    }

    public function __get($name)
    {
        return $this->data[$name] ? $this->data[$name] : null;
    }
}
