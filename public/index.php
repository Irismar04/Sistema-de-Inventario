<?php

session_start();
require dirname(__DIR__) . '/vendor/autoload.php';
require dirname(__DIR__) . '/routes/rutas.php';
use Inventario\App;

function generarAlertaExito($texto)
{
    $alerta = '<div id="alerta" class="alert alert-success slide-fade-enter-from tostada" role="alert">'.$texto.'</div>';
    return $alerta;
}

function generarAlertaError($texto)
{
    $alerta = '<div id="alerta" class="alert alert-danger slide-fade-enter-from tostada" role="alert">'.$texto.'</div>';
    return $alerta;
}



function modal($nombre, $id, $mensaje)
{

    return '<dialog data-modal id="delete-modal-'.$id.'"> 
<p>
    '.$mensaje.'
</p>
<div>
    <button class="btn" onclick="cerrar('.$id.')">Cancelar</button>
    <a class="btn" href="'.borrarUrl($nombre, $id).'">Confirmar</a>
</div>
</dialog>';
}


function url($uri)
{
    return "http://localhost/sistema-de-inventario/public/$uri";
}

function editarUrl($uri, $id)
{
    return "http://localhost/sistema-de-inventario/public/$uri/editar?id=$id";
}

function borrarUrl($uri, $id)
{
    return "http://localhost/sistema-de-inventario/public/$uri/destruir?id=$id";
}

$db = include dirname(__DIR__) . '/config/database.php';


$app = new App($router, $db);
$app->correr();
