<?php


use Inventario\Routing\Router;
use App\Controllers\IndexController;
use App\Controllers\AnadirController;
use App\Controllers\InicioController;
use App\Controllers\ListaController;
use App\Controllers\ProductoController;
use App\Controllers\TablesController;
use App\Controllers\UsuarioController;

$router = new Router();

$router->get('/', [IndexController::class, 'mostrar']);

$router->get('/anadir', [AnadirController::class, 'mostrar']);

$router->get('/inicio', [InicioController::class, 'mostrar']);

$router->get('/sistema-de-inventario/public/anadir', [anadirController::class, 'mostrar']);

$router->get('/lista', [ListaController::class, 'mostrar']);

$router->get('/sistema-de-inventario/public/', function () {
    $controlador = new IndexController();
    $controlador->mostrar();
});


$router->get('/sistema-de-inventario/public/anadir', function () {
    $controlador = new AnadirController();
    $controlador->mostrar();
});



$router->get('/usuario', [UsuarioController::class, 'mostrar']);

$router->controlador('/productos', ProductoController::class);
