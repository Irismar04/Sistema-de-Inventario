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
    $carpetas = str_replace("/index.php", "", $_SERVER['PHP_SELF']);
    $path = str_replace($carpetas, '', $path);
    $arrayPath = array_map(
        function ($value) {
            return implode('/', $value);
        },
        array_chunk(explode('/', $path), 2)
    );
    return $arrayPath[0];
}
