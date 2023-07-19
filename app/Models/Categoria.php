<?php

namespace App\Models;

use PDO;

class Categoria extends Model
{
    protected $tabla = 'categoria';

    public function guardar($datosForm)
    {
        $query = "INSERT INTO {$this->tabla} (nom_categoria) VALUES (:nom_categoria)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":nom_categoria", $datosForm['nombre']);
        $statement->execute();

        return $statement->rowCount() > 0;
    }

    public function actualizar($datosForm)
    {
        $query = "UPDATE {$this->tabla} SET nom_categoria = :nuevo_nombre WHERE id_categoria = :id_categoria";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":nuevo_nombre", $datosForm['nombre']);
        $statement->bindParam(":id_categoria", $datosForm['id']);
        $statement->execute();

        return $statement->rowCount() > 0;
    }

    public function uno($id)
    {
        // Consulta para buscar el registro por su ID en la tabla deseada
        $sql = "SELECT * FROM {$this->tabla} WHERE id_categoria = :id_categoria";

        // Preparar la consulta
        $stmt = $this->db->prepare($sql);

        // Asignar el valor del parámetro :id
        $stmt->bindParam(':id_categoria', $id, PDO::PARAM_INT);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el registro como un arreglo asociativo
        $registro = $stmt->fetch(PDO::FETCH_ASSOC);

        return $registro;
    }

    public function destruir($id)
    {
        $sql = "DELETE FROM categoria WHERE id_categoria = :id_categoria";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':id_categoria', $id);
        $statement->execute();
    }
}
