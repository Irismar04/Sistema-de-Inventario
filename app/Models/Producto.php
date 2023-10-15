<?php

namespace App\Models;

use PDO;

class Producto extends Model
{
    protected $tabla = 'producto';
    protected $id = 'id_producto';

    protected $relaciones = [
        'categoria' => 'id_categoria',
        'marca' => 'id_marca'
    ];

    public function revisarDuplicados($datosForm, $vista)
    {

        // Revisa si el formulario tiene un id(si tiene un id, es un formulario de editar)

        if (isset($datosForm['id'])) {
            $sql = "SELECT * FROM {$this->tabla}
            WHERE nom_producto LIKE :nom_producto AND
            NOT id_producto = :id_producto" ;

        }
        //si no tiene id, es un formulario de crear
        else {
            $sql = "SELECT * FROM {$this->tabla} WHERE nom_producto LIKE :nom_producto";
        }

        // Ejecuta la sentencia SQL y revisa de que este correcta

        $columnaUno = $this->db->prepare($sql);

        //Si existe un id, lo introduce en la setencia SQL
        if (isset($datosForm['id'])) {
            $columnaUno->bindParam(":id_producto", $datosForm['id']);
        }

        $nombre = "%" .$datosForm['nombre']."%";
        $columnaUno->bindParam(":nom_producto", strtolower($nombre));
        $columnaUno->execute();


        //Revisa si hay una producto con ese nombre, si hay, la redirige con error
        if ($columnaUno->rowCount() > 0) {
            parent::redirigir("productos/{$vista}?error=nombre&id={$datosForm['id']}");
        }
    }

    public function guardar($datosForm)
    {
        $this->revisarDuplicados($datosForm, 'crear');

        $query =
        "INSERT INTO {$this->tabla}
        (id_categoria, id_marca, nom_producto, precio_producto, stock, stock_minimo )
        VALUES 
        (:id_categoria, :id_marca, :nom_producto, :precio_producto,:stock, :stock_minimo)";


        $statement = $this->db->prepare($query);

        $statement->bindParam(":id_categoria", $datosForm['categorias']);
        $statement->bindParam(":id_marca", $datosForm['marcas']);
        $statement->bindParam(":nom_producto", $datosForm['nombre']);
        $statement->bindParam(":precio_producto", $datosForm['precio']);
        $statement->bindParam(":stock", $datosForm['stock']);
        $statement->bindParam(":stock_minimo", $datosForm['stock_minimo']);


        $statement->execute();

        return $statement->rowCount() > 0;
    }

    public function actualizar($datosForm)
    {
        $this->revisarDuplicados($datosForm, 'editar');

        $query = "UPDATE {$this->tabla} SET 
        nom_producto = :nuevo_nombre,
        id_categoria = :id_categoria,
        id_marca = :id_marca,
        precio_producto = :precio_producto,
        stock_minimo = :stock_minimo 
        WHERE id_producto = :id_producto";

        $statement = $this->db->prepare($query);
        $statement->bindParam(":id_producto", $datosForm['id']);

        $statement->bindParam(":nuevo_nombre", $datosForm['nombre']);
        $statement->bindParam(":id_categoria", $datosForm['categorias']);
        $statement->bindParam(":id_marca", $datosForm['marcas']);
        $statement->bindParam(":precio_producto", $datosForm['precio']);
        $statement->bindParam(":stock_minimo", $datosForm['stock_minimo']);


        $statement->execute();

        return $statement->rowCount() > 0;
    }
}
