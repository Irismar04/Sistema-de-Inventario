<?php

namespace App\Controllers;

use App\Models\Entrada;
use App\Models\Producto;
use App\Models\Salida;
use App\Models\Usuario;

class InicioController extends Controller
{
    public function mostrar()
    {
        // Contar productos
        $productos = count((new Producto())->todos());
        $productosDebajoDeStockMinimo = count((new Producto())->todosDebajoDeStockMinimo());

        // Contar usuarios
        $usuarios = count((new Usuario())->todos());
        $usuariosActivos = count((new Usuario())->todosActivos());

        // Producto mas vendido
        $productoMasVendido = (new Salida())->productoMasVendido();

        // Producto menos vendido
        $productoMenosVendido = (new Salida())->productoMenosVendido();

        // Ultimo producto registrado
        $ultimoProducto = (new Producto())->ultimoProducto();

        // Ultima entrada registrada
        $ultimaSalida = (new Salida())->ultimaSalida();

        // Ultima salida registrada
        $ultimaEntrada = (new Entrada())->ultimaEntrada();
        return parent::ver('index', [
            'nombre' => 'Inversiones Zormar',
            'productos' => $productos,
            'productosDebajoDeStockMinimo' => $productosDebajoDeStockMinimo,
            'usuarios' => $usuarios,
            'usuariosActivos' => $usuariosActivos,
            'productoMasVendido' => $productoMasVendido,
            'productoMenosVendido' => $productoMenosVendido,
            'ultimoProducto' => $ultimoProducto,
            'ultimaSalida' => $ultimaSalida,
            'ultimaEntrada' => $ultimaEntrada,
        ], 'Inversiones Zormar - Dashboard');
    }
}
