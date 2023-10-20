<?php

namespace App\Models;

class Entrada extends Model
{
    protected $tabla = 'detalle_entrada';
    protected $id = 'id_detalle_e';

    protected $relaciones = [
        'producto' => 'id_producto',
        'entrada' => 'id_entrada'
    ];

    public function actualizar($datosForm)
    {
    }

    public function destruir($id)
    {
    }

    public function guardar($datosForm)
    {
        $queryEntrada = "INSERT INTO entrada (cantidad_entrada, fecha_entrada) VALUES (:cantidad_entrada, default)";
        $queryDetalles = "INSERT INTO {$this->tabla} 
        (id_producto, id_entrada, fecha_vencimiento, precio_entrada) 
        VALUES 
        (:id_producto, :id_entrada, :fecha_vencimiento, :precio_entrada)";
        $queryProducto = "UPDATE producto SET stock = stock + :cantidad_entrada WHERE id_producto = :id_producto";
        try {
            $this->db->beginTransaction();
            // Hace el insert en la tabla de entrada
            $entrada = $this->db->prepare($queryEntrada);
            $entrada->bindParam(":cantidad_entrada", $datosForm['cantidad_entrada']);
            $entrada->execute();

            $id = $this->db->lastInsertId();

            $detalles = $this->db->prepare($queryDetalles);
            $detalles->bindParam(":id_producto", $datosForm['id_producto']);
            $detalles->bindParam(":id_entrada", $id);
            $detalles->bindParam(":fecha_vencimiento", $datosForm['fecha_vencimiento']);
            $detalles->bindParam(":precio_entrada", $datosForm['precio_entrada']);
            $detalles->execute();

            $producto = $this->db->prepare($queryProducto);
            $producto->bindParam(":id_producto", $datosForm['id_producto']);
            $producto->bindParam(":cantidad_entrada", $datosForm['cantidad_entrada']);
            $producto->execute();

            $this->db->commit();

            return true;
        } catch (\Throwable $th) {
            $this->db->rollBack();

            return false;
        }
    }

    public function ultimaEntrada()
    {
        $sql = "SELECT *
        FROM entrada e
        INNER JOIN detalle_entrada de ON e.id_entrada = de.id_entrada
        INNER JOIN producto p ON p.id_producto = de.id_producto
        ORDER BY e.id_entrada DESC
        LIMIT 1";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $entrada = $stmt->fetch();
        return $entrada;
    }
}
