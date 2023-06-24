<?php 


use Inventario\Routing\Router;
use App\Controllers\IndexController;
use App\Controllers\AnadirController;
use App\Controllers\InicioController;
use App\Controllers\ListaController;
use App\Controllers\TablesController;
use App\Controllers\UsuarioController;



$router = new Router;

$router->get('/sistema-de-inventario/public', [IndexController::class, 'mostrar']);



$router->get('/sistema-de-inventario/public/anadir', function (){
    $controlador = new AnadirController;
    $controlador->mostrar();
});


$router->get('/sistema-de-inventario/public/inicio', function (){
    $controlador = new InicioController;
    $controlador->mostrar();
});

$router->get('/sistema-de-inventario/public/lista', function (){
    $controlador = new ListaController;
    $controlador->mostrar();
});

$router->get('/sistema-de-inventario/public/tables', function (){
    $controlador = new TablesController;
    $controlador->mostrar();
});

$router->get('/sistema-de-inventario/public/usuario', function (){
    $controlador = new UsuarioController;
    $controlador->mostrar();
});
