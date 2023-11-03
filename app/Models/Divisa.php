<?php

namespace App\Models;

use App\Constants\Acciones;
use App\Traits\Registrable;

class Divisa extends Model
{
    use Registrable;

    protected $tabla = "divisa";

    protected $id = "id_divisa";

    public function ultima()
    {
        // Consulta para buscar el registro por su ID en la tabla deseada
        $sql = "SELECT * FROM {$this->tabla} ORDER BY {$this->tabla}.{$this->id} DESC LIMIT 1";

        // Preparar la consulta
        $stmt = $this->db->prepare($sql);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el registro como un arreglo asociativo
        $registro = $stmt->fetch();

        return $registro;
    }

    public function guardar($datosForm)
    {
        $query = "INSERT INTO {$this->tabla} (cantidad) VALUES (:cantidad)";
        $statement = $this->db->prepare($query);

        $statement->bindParam(":cantidad", $datosForm['precio']);
        $statement->execute();

        $this->registrar(Acciones::UPDATE);

        return $statement->rowCount() > 0;
    }

    public function actualizar($datosForm)
    {
    }
}
