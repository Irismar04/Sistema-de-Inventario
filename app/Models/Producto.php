<?php

namespace App\Models;

use PDO;

class Producto extends Model
{
    protected $tabla = 'producto';

    public function todos()
    {
        // Consulta para buscar todos los registros en la tabla deseada
        $sql = "SELECT * FROM {$this->tabla} 
    LEFT JOIN categoria ON categoria.id_categoria = producto.id_categoria
    LEFT JOIN marca ON marca.id_marca = producto.id_marca";

        // Prepara la consultar
        $stmt = $this->db->prepare($sql);

        //Ejecutar la consulta
        $stmt->execute();

        // Obtener todos los registros como un arreglo asociativo
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultados;

    }

    public function guardar($datosForm)
    {
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

    public function uno($id)
    {
        // Consulta para buscar el registro por su ID en la tabla deseada
        $sql = "SELECT * FROM {$this->tabla} WHERE id_producto = :id_producto";

        // Preparar la consulta
        $stmt = $this->db->prepare($sql);

        // Asignar el valor del parámetro :id
        $stmt->bindParam(':id_producto', $id, PDO::PARAM_INT);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el registro como un arreglo asociativo
        $registro = $stmt->fetch(PDO::FETCH_ASSOC);

        return $registro;
    }

    public function destruir($id)
    {
        $sql = "DELETE FROM producto WHERE id_producto = :id_producto";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':id_producto', $id);
        $statement->execute();
    }
}
