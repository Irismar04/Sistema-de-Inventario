<?php

namespace App\Models;

class Historial extends Model
{
    protected $tabla = "historial";

    protected $id = "id_historial";

    protected $relaciones = [
        'usuario' => 'id_usuario'
    ];

    public function guardar($datosForm)
    {
        $query = "INSERT INTO {$this->tabla} 
            (id_usuario, accion, tabla, creado_en) 
        VALUES 
            (:id_usuario, :accion, :tabla, now()) ";

        $statement = $this->db->prepare($query);

        $id = $_SESSION['usuario']['id_usuario'];

        $statement->bindParam(':id_usuario', $id);
        $statement->bindParam(":accion", $datosForm['accion']);
        $statement->bindParam(":tabla", $datosForm['tabla']);
        $statement->execute();

        return $statement->rowCount() > 0;
    }

    public function actualizar($datosForm)
    {
    }
}
