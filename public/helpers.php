<?php

function url($uri)
{
    $basePath = dirname(__DIR__);
    $appConfig = include "{$basePath}/config/app.php";
    return "{$appConfig['url']}/$uri";
}

function root_dir($uri)
{
    $basePath = dirname(__DIR__);
    $appConfig = include "{$basePath}/config/app.php";
    return "{$appConfig['root_dir']}/$uri";
}

function editarUrl($uri, $id)
{
    return url($uri)."/editar?id=$id";
}

function borrarUrl($uri, $id)
{
    return url($uri)."/destruir?id=$id";
}

function assetsDir($file)
{
    return root_dir('assets')."$file";
}

function selected($primero, $segundo)
{
    return ($primero == $segundo) ? 'selected' : '';
}
