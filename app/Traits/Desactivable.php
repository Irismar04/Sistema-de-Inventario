<?php

namespace App\Traits;

use App\Constants\Status;

trait Desactivable
{
    public function cambiarEstado($datosForm)
    {
        $newState = ($datosForm['estado_viejo'] == Status::ACTIVE) ? Status::INACTIVE : Status::ACTIVE ;
        $query = "UPDATE {$this->tabla} SET estado = :estado WHERE {$this->id} = :{$this->id}";

        $statement = $this->db->prepare($query);
        $statement->bindParam(":estado", $newState);
        $statement->bindParam(":{$this->id}", $datosForm['id']);
        $statement->execute();

        return [$statement->rowCount() > 0, $newState];
    }

    public function todosActivos()
    {
        $activo = Status::ACTIVE;

        $sql = "SELECT * FROM {$this->tabla} WHERE estado != $activo";

        foreach ($this->relaciones as $tabla => $columna) {
            $sql .= " LEFT JOIN {$tabla} ON {$tabla}.{$columna} = {$this->tabla}.{$columna}";
        }

        // Preparar la consulta
        $stmt = $this->db->prepare($sql);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener todos los registros como un arreglo asociativo
        $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $resultados;
    }

    public function todosSinBorrar()
    {
        $borrado = Status::DELETED;
        // Consulta para buscar todos los registros en la tabla deseada
        $sql = "SELECT * FROM {$this->tabla} WHERE estado != $borrado";

        foreach ($this->relaciones as $tabla => $columna) {
            $sql .= " LEFT JOIN {$tabla} ON {$tabla}.{$columna} = {$this->tabla}.{$columna}";
        }

        // Preparar la consulta
        $stmt = $this->db->prepare($sql);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener todos los registros como un arreglo asociativo
        $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $resultados;
    }

    public function softDelete($id)
    {
        $estado = Status::DELETED;
        try {
            $sql = "UPDATE {$this->tabla} SET estado = {$estado} WHERE {$this->id} = :{$this->id}";
            $statement = $this->db->prepare($sql);
            $statement->bindParam(":{$this->id}", $id);
            $statement->execute();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
