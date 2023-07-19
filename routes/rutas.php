<?php


use Inventario\Routing\Router;
use App\Controllers\IndexController;
use App\Controllers\AnadirController;
use App\Controllers\CategoriaController;
use App\Controllers\InicioController;
use App\Controllers\ListaController;
use App\Controllers\ProductoController;
use App\Controllers\UsuarioController;
use Inventario\Routing\Request;

$router = new Router();

$router->get('/login', function () {
    $request = new Request($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
    $path = $request->path;
    if($path === "/sistema-de-inventario/public/login" && isset($_SESSION['usuario'])) {
        header("Location: /sistema-de-inventario/public/");
    }
    $controlador = new InicioController();
    echo $controlador->mostrar();
});

$router->post('/login', function () {
    $controlador = new InicioController();
    $controlador->login($_POST);
});

$router->get('/logout', function () {
    $controlador = new InicioController();
    $controlador->logout();
});

// Rutas para las categorias
$router->controlador('/categorias', CategoriaController::class);


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
