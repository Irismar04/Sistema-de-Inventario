<?php

function url($uri)
{
    $basePath = dirname(__DIR__);
    $appConfig = include "{$basePath}/config/app.php";

    return "{$appConfig['url']}/$uri";
}

function editarUrl($uri, $id)
{
    return url($uri)."/editar?id=$id";
}

function borrarUrl($uri, $id)
{
    return url($uri)."/destruir?id=$id";
}
