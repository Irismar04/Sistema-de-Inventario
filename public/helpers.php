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

function passUrl($uri, $id)
{
    return url($uri)."/cambiar-contrasena?id=$id";
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
