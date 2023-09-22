<?php

namespace App\Controllers;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;


class ProductoController extends Controller
{
    public function index()
    {
    
        $modelo = new Producto();
        $productos = $modelo->todos();
        return parent::ver('productos/index' , ['productos' => $productos]); 
    }

        public function crear()
    {
        $modelo = new Categoria();
        $categorias = $modelo->todos();
       

        $modeloDos = new Marca();
        $marcas = $modeloDos->todos();
        return parent::ver('productos/crear', ['categorias' => $categorias, 'marcas'=>$marcas]);
    }

    public function editar()
    {
       $modelo = new Producto();
       $modeloDos = new Categoria();
       $modeloTres = new Marca();
       $producto = $modelo->uno($_GET['id']); 
       $categorias = $modeloDos->todos(); 
       $marcas = $modeloTres->todos();
    return parent::ver('productos/editar', [
        
    'producto' => $producto, 
    'categorias' => $categorias, 
    'marcas' => $marcas]);
    }

     public function guardar()
    {
        $modelo = new Producto();
        $modelo->guardar($_POST);

        parent::redirigir('productos?success=crear');
    }

    public function actualizar()
    {
        $modelo = new Producto();
        $modelo->actualizar($_POST);

       parent::redirigir('productos?success=editar');
    }

     public function destruir()
    {
        $modelo = new Producto();
        $modelo->destruir($_GET['id']);

        parent::redirigir('productos?success=borrar');
    }

}