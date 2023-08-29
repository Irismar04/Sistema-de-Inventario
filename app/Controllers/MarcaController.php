<?php

namespace App\Controllers;
use App\Models\Marca;


class MarcaController extends Controller
{
    public function index()
    {
    
        $modelo = new Marca();
        $marcas = $modelo->todos();
        return parent::ver('marcas/index' , ['marcas' => $marcas]);
    }

        public function crear()
    {
        return parent::ver('marcas/crear');
    }

    public function editar()
    {
       $modelo = new Marca();
       $marca = $modelo->uno($_GET['id']); 
        return parent::ver('marcas/editar', ['marca' =>$marca]);
    }

     public function guardar()
    {
        $modelo = new Marca();
        $modelo->guardar($_POST);

        parent::redirigir('marcas?success=crear');
    }

    public function actualizar()
    {
        $modelo = new Marca();
        $modelo->actualizar($_POST);

       parent::redirigir('marcas?success=editar');
    }

     public function destruir()
    {
        $modelo = new Marca();
        $modelo->destruir($_GET['id']);

        parent::redirigir('marcas?success=borrar');
    }

}