<?php

session_start();
$basePath = dirname(__DIR__);
define("ROOT_DIR", $basePath);

require "{$basePath}/config/app.php";
require "{$basePath}/vendor/autoload.php";
require "{$basePath}/routes/rutas.php";
require "{$basePath}/public/components.php";
require "{$basePath}/public/helpers.php";

use Inventario\App;

$db = include "{$basePath}/config/database.php";

$app = new App($router, $db, $basePath);
$app->correr();
