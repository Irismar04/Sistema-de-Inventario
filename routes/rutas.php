<?php

use App\Controllers\HistorialController;
use Inventario\Routing\Router;
use App\Controllers\CategoriaController;
use App\Controllers\DivisaController;
use App\Controllers\EntradaController;
use App\Controllers\InicioController;
use App\Controllers\LoginController;
use App\Controllers\MarcaController;
use App\Controllers\PerfilController;
use App\Controllers\ProductoController;
use App\Controllers\SalidaController;
use App\Controllers\UsuarioController;

$router = new Router();

$router->get('/', [LoginController::class, 'index']);

$router->post('/login', [LoginController::class, 'login']);

$router->get('/logout', [LoginController::class, 'logout']);

$router->get('/dashboard', [InicioController::class, 'index'])->auth();

// Rutas para las categorias
$router->controlador('/categorias', CategoriaController::class, 'auth');
$router->post('/categorias/cambiar-estado', [CategoriaController::class, 'cambiarEstado'])->auth();

// Rutas para las marcas
$router->controlador('/marcas', MarcaController::class, 'auth');
$router->post('/marcas/cambiar-estado', [MarcaController::class, 'cambiarEstado'])->auth();

// Rutas para los productos
$router->controlador('/productos', ProductoController::class, 'auth');
$router->post('/productos/cambiar-estado', [ProductoController::class, 'cambiarEstado'])->auth();
$router->get('/productos/inactivos', [ProductoController::class, 'inactivos'])->auth();
$router->get('/productos/reportes', [ProductoController::class, 'reportes'])->auth();

// Rutas para las entradas
$router->get('/entradas', [EntradaController::class, 'index'])->auth();
$router->get('/entradas/crear', [EntradaController::class, 'crear'])->auth();
$router->post('/entradas', [EntradaController::class, 'guardar'])->auth();
$router->get('/entradas/reportes', [EntradaController::class, 'reportes'])->auth();

// Rutas para las salidas
$router->get('/salidas', [SalidaController::class, 'index'])->auth();
$router->get('/salidas/crear', [SalidaController::class, 'crear'])->auth();
$router->post('/salidas', [SalidaController::class, 'guardar'])->auth();
$router->get('/salidas/reportes', [SalidaController::class, 'reportes'])->auth();

// Rutas para la gestión de usuarios
$router->controlador('/usuarios', UsuarioController::class, 'admin');
$router->post('/usuarios/cambiar-estado', [UsuarioController::class, 'cambiarEstado'])->auth('admin');
$router->get('/usuarios/cambiar-contrasena', [UsuarioController::class, 'cambiarContrasena'])->auth('admin');
$router->post('/usuarios/cambiar-contrasena', [UsuarioController::class, 'guardarCambiarContrasena'])->auth('admin');
$router->get('/usuarios/datos', [UsuarioController::class, 'mostrar'])->auth('admin');

// Rutas para la divisa
$router->get('/divisa', [DivisaController::class, 'index'])->auth('admin');
$router->post('/divisa', [DivisaController::class, 'guardar'])->auth('admin');

// Rutas para el historial
$router->get('/historial', [HistorialController::class,'index'])->auth('admin');

// Rutas del perfil
$router->get('/perfil/editar-perfil', [PerfilController::class, 'editarPerfil'])->auth();
$router->get('/perfil/cambiar-contrasena', [PerfilController::class, 'cambiarContrasena'])->auth();
$router->post('/perfil/cambiar-contrasena', [PerfilController::class, 'guardarCambiarContrasena'])->auth();
$router->post('/perfil/actualizar', [PerfilController::class, 'actualizar'])->auth();

// Rutas de API
$router->get('/api/productos-por-categoria', [ProductoController::class, 'productosPorCategoriaJson'])->auth();
$router->get('/api/productos-por-fecha', [ProductoController::class,'productosPorFechaJson'])->auth();
$router->get('/api/salidas-por-fecha', [SalidaController::class,'salidasPorFechaJson'])->auth();
$router->get('/api/entradas-por-fecha', [EntradaController::class,'entradasPorFechaJson'])->auth();
