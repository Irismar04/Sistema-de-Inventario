<?php

session_start();
require dirname(__DIR__) . '/vendor/autoload.php';
require dirname(__DIR__) . '/routes/rutas.php';

$db = include dirname(__DIR__) . '/config/database.php';

use Inventario\App;

$app = new App($router, $db);
$app->correr();
