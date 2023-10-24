<?php

namespace App\Models;

use Inventario\Database\Model as BaseModel;

abstract class Model extends BaseModel
{
    protected $tabla;

    protected $id;

    protected $relaciones = [];

    public function todos()
    {
        // Consulta para buscar todos los registros en la tabla deseada
        $sql = "SELECT * FROM {$this->tabla}";

        foreach ($this->relaciones as $tabla => $columna) {
            $sql .= " LEFT JOIN {$tabla} ON {$tabla}.{$columna} = {$this->tabla}.{$columna}";
        }

        $sql .= " ORDER BY {$this->tabla}.{$this->id} DESC";

        // Preparar la consulta
        $stmt = $this->db->prepare($sql);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener todos los registros como un arreglo asociativo
        $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $resultados;
    }

    public function destruir($id)
    {
        try {
            $sql = "DELETE FROM {$this->tabla} WHERE {$this->id} = :{$this->id}";
            $statement = $this->db->prepare($sql);
            $statement->bindParam($this->id, $id);
            $statement->execute();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function uno($id)
    {
        // Consulta para buscar el registro por su ID en la tabla deseada
        $sql = "SELECT * FROM {$this->tabla} WHERE {$this->id} = :{$this->id}";

        // Preparar la consulta
        $stmt = $this->db->prepare($sql);

        // Asignar el valor del parámetro :id
        $stmt->bindParam($this->id, $id, \PDO::PARAM_INT);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el registro como un arreglo asociativo
        $registro = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $registro;
    }

    abstract public function guardar($datosForm);

    abstract public function actualizar($datosForm);
}
