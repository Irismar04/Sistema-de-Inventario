<?php 

namespace Inventario\View;

class ViewEngine 
{

    public $viewPath;

    public function __construct()
    {
        $this -> viewPath = dirname(__DIR__) . '/../app/Views/';
    }
    public function render ($vista)
    {
        include $this->viewPath . $vista . ".view.php";
    }

}