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

$router->get('/sistema-de-inventario/public/anadir', [anadirController::class, 'mostrar']);

$router->get('/sistema-de-inventario/public/inicio', [InicioController::class, 'mostrar']);

$router->get('/sistema-de-inventario/public/lista', [listaController::class, 'mostrar']);

$router->get('/sistema-de-inventario/public/tables', [tablesController::class, 'mostrar']);

$router->get('/sistema-de-inventario/public/usuario', [usuarioController::class, 'mostrar']);