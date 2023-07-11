<?php 

use Inventario\Routing\Router;
use App\Controllers\IndexController;
use App\Controllers\AnadirController;
use App\Controllers\InicioController;
use App\Controllers\ListaController;
use App\Controllers\TablesController;
use App\Controllers\UsuarioController;



$router = new Router;

$router->get('/', [IndexController::class, 'mostrar']);

$router->get('/anadir', [AnadirController::class, 'mostrar']);

$router->get('/inicio', [InicioController::class, 'mostrar']);


$router->get('/lista', [ListaController::class, 'mostrar']);

$router->get('/tables', [TablesController::class, 'mostrar']);

$router->get('/usuario', [UsuarioController::class, 'mostrar']);
