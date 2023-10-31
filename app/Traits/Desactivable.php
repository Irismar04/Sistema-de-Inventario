<?php

namespace App\Traits;

use App\Constants\Acciones;
use App\Constants\Status;

trait Desactivable
{
    public function cambiarEstado($datosForm)
    {
        // Comprueba que el estado introducido es soportado por el sistema
        if(!Status::exists($datosForm['estado_viejo'])) {
            return false;
        }

        $newState = ($datosForm['estado_viejo'] == Status::ACTIVE) ? Status::INACTIVE : Status::ACTIVE ;
        $query = "UPDATE {$this->tabla} SET estado = :estado WHERE {$this->id} = :{$this->id}";

        $statement = $this->db->prepare($query);
        $statement->bindParam(":estado", $newState);
        $statement->bindParam(":{$this->id}", $datosForm['id']);
        $statement->execute();

        if($newState == Status::ACTIVE) {
            $this->registrar(Acciones::ACTIVATE);
        } else {
            $this->registrar(Acciones::DEACTIVATE);
        }

        return [$statement->rowCount() > 0, $newState];
    }

    public function todosActivos()
    {
        $activo = Status::ACTIVE;
        $estado = "{$this->tabla}.estado";
        $sql = "SELECT * FROM {$this->tabla}";

        foreach ($this->relaciones as $tabla => $columna) {
            $sql .= " LEFT JOIN {$tabla} ON {$tabla}.{$columna} = {$this->tabla}.{$columna}";
        }

        $sql .= " WHERE {$estado} = {$activo}";
        // Preparar la consulta
        $stmt = $this->db->prepare($sql);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener todos los registros como un arreglo asociativo
        $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $resultados;
    }

    public function todosInactivos()
    {
        $inactivo = Status::INACTIVE;
        $estado = "{$this->tabla}.estado";
        $sql = "SELECT * FROM {$this->tabla}";

        foreach ($this->relaciones as $tabla => $columna) {
            $sql .= " LEFT JOIN {$tabla} ON {$tabla}.{$columna} = {$this->tabla}.{$columna}";
        }

        $sql .= " WHERE {$estado} = {$inactivo}";
        // Preparar la consulta
        $stmt = $this->db->prepare($sql);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener todos los registros como un arreglo asociativo
        $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $resultados;
    }

    // public function todosActivos()
    // {
    //     $borrado = Status::DELETED;
    //     $estado = "{$this->tabla}.estado";
    //     // Consulta para buscar todos los registros en la tabla deseada
    //     $sql = "SELECT * FROM {$this->tabla}";

    //     foreach ($this->relaciones as $tabla => $columna) {
    //         $sql .= " LEFT JOIN {$tabla} ON {$tabla}.{$columna} = {$this->tabla}.{$columna}";
    //     }

    //     $sql .= " WHERE {$estado} != {$borrado}";

    //     // Preparar la consulta
    //     $stmt = $this->db->prepare($sql);

    //     // Ejecutar la consulta
    //     $stmt->execute();

    //     // Obtener todos los registros como un arreglo asociativo
    //     $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    //     return $resultados;
    // }

    public function softDelete($id)
    {
        $estado = Status::INACTIVE;
        try {
            $sql = "UPDATE {$this->tabla} SET estado = {$estado} WHERE {$this->id} = :{$this->id}";
            $statement = $this->db->prepare($sql);
            $statement->bindParam(":{$this->id}", $id);
            $statement->execute();

            $this->registrar(Acciones::DELETE);

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
