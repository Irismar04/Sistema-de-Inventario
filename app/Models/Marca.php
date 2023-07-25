<?php

namespace App\Models;

use PDO;

class Marca extends Model
{
    protected $tabla = 'marca';

    public function guardar($datosForm)
    {
        $query = "INSERT INTO {$this->tabla} (nom_marca) VALUES (:nom_marca)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":nom_marca", $datosForm['nombre']);
        $statement->execute();

        return $statement->rowCount() > 0;
    }

    public function actualizar($datosForm)
    {
        $query = "UPDATE {$this->tabla} SET nom_marca = :nuevo_nombre WHERE id_marca = :id_marca";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":nuevo_nombre", $datosForm['nombre']);
        $statement->bindParam(":id_marca", $datosForm['id']);
        $statement->execute();

        return $statement->rowCount() > 0;
    }

    public function uno($id)
    {
        // Consulta para buscar el registro por su ID en la tabla deseada
        $sql = "SELECT * FROM {$this->tabla} WHERE id_marca = :id_marca";

        // Preparar la consulta
        $stmt = $this->db->prepare($sql);

        // Asignar el valor del parámetro :id
        $stmt->bindParam(':id_marca', $id, PDO::PARAM_INT);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el registro como un arreglo asociativo
        $registro = $stmt->fetch(PDO::FETCH_ASSOC);

        return $registro;
    }

    public function destruir($id)
    {
        $sql = "DELETE FROM marca WHERE id_marca = :id_marca";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':id_marca', $id);
        $statement->execute();
    }
}
