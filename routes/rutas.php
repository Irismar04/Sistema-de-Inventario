<?php

use Inventario\Routing\Router;
use App\Controllers\CategoriaController;
use App\Controllers\EntradaController;
use App\Controllers\InicioController;
use App\Controllers\LoginController;
use App\Controllers\MarcaController;
use App\Controllers\ProductoController;
use App\Controllers\UsuarioController;

$router = new Router();

$router->get('/', [LoginController::class, 'mostrar']);

$router->post('/login', [LoginController::class, 'login']);

$router->get('/logout', [LoginController::class, 'logout']);

$router->get('/dashboard', [InicioController::class, 'mostrar'])->auth();

// Rutas para las categorias
$router->controlador('/categorias', CategoriaController::class, 'auth');

// Rutas para las marcas
$router->controlador('/marcas', MarcaController::class, 'auth');

// Rutas para los productos
$router->controlador('/productos', ProductoController::class, 'auth');
$router->post('/productos/activar', [ProductoController::class, 'activar'])->auth();
$router->post('/productos/desactivar', [ProductoController::class, 'desactivar'])->auth();

// Rutas para las entradas
$router->get('/entradas', [EntradaController::class, 'index'])->auth();
$router->get('/entradas/crear', [EntradaController::class, 'crear'])->auth();
$router->post('/entradas/guardar', [EntradaController::class, 'guardar'])->auth();

$router->get('/usuario', [UsuarioController::class, 'mostrar']);
