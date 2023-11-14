<?php

function url($uri)
{
    $url = APP_URL;
    return "{$url}/{$uri}";
}

function root_dir($uri)
{
    $basePath = ROOT_DIR;
    return "{$basePath}/{$uri}";
}

function editarUrl($uri, $id)
{
    return url($uri)."/editar?id=$id";
}

function passUrl($uri, $id)
{
    return url($uri)."/cambiar-contrasena?id=$id";
}

function borrarUrl($uri, $id)
{
    return url($uri)."/destruir?id=$id";
}

function assets($file)
{
    return url('assets')."$file";
}

function selected($primero, $segundo)
{
    return ($primero == $segundo) ? 'selected' : '';
}

function disabled($primero, $segundo)
{
    return ($primero == $segundo) ? 'disabled' : '';
}

function moneyUsd($int)
{
    return '$' . number_format($int, 2, ',', '.');
}

function moneyBolivar($int)
{
    return number_format($int, 2, ',', '.') . ' Bs';
}

function unidades($string)
{
    return $string . ' unidades';
}

function formatoDeFecha($date)
{
    $date = new DateTimeImmutable($date);
    return $date->format('d-m-Y');
}

function formatoDeFechaConHora($date)
{
    $date = new DateTimeImmutable($date);
    return $date->format('d-m-Y H:i:s');
}

function rutaBase()
{
    $parsedRequest = parse_url($_SERVER['REQUEST_URI']);
    $path = $parsedRequest['path'];
    $basePath = '/sistema-de-inventario/public';

    $path = str_replace($basePath . '/', '', $path);
    $arrayPath = explode('/', $path);

    return $arrayPath[0];
}
