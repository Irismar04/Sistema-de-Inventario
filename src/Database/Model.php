<?php

namespace Inventario\Database;

use Inventario\App;

use PDO;

abstract class Model
{
    protected $db;

    protected $tabla;

    public function __construct()
    {
        $this->db = App::db();
    }

    public function todos()
    {
        // Consulta para buscar todos los registros en la tabla deseada
        $sql = "SELECT * FROM {$this->tabla}";

        // Preparar la consulta
        $stmt = $this->db->prepare($sql);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener todos los registros como un arreglo asociativo
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultados;
    }

    public function uno($id)
    {
        // Consulta para buscar el registro por su ID en la tabla deseada
        $sql = "SELECT * FROM {$this->tabla} WHERE id = :id";

        // Preparar la consulta
        $stmt = $this->db->prepare($sql);

        // Asignar el valor del parámetro :id
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el registro como un arreglo asociativo
        $registro = $stmt->fetch(PDO::FETCH_ASSOC);

        return $registro;
    }

    // abstract public function actualizar($id, $datosForm);

    // abstract public function borrar($id);
}
