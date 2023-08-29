<?php

namespace App\Models;

class Entrada extends Model
{
    protected $tabla = 'detalle_entrada';

    public function actualizar($datosForm)
    {
    }

    public function destruir($id)
    {
    }

    public function todos()
    {
        // Consulta para buscar todos los registros en la tabla deseada
        $sql = "SELECT * FROM {$this->tabla} 
        LEFT JOIN producto ON producto.id_producto = detalle_entrada.id_producto
        LEFT JOIN entrada ON entrada.id_entrada = detalle_entrada.id_entrada";

        // Prepara la consultar
        $stmt = $this->db->prepare($sql);

        //Ejecutar la consulta
        $stmt->execute();

        // Obtener todos los registros como un arreglo asociativo
        $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $resultados;

    }

    public function guardar($datosForm)
    {
    }
}
