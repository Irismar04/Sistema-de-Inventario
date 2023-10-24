<?php

namespace App\Models;

use App\Constants\Motivo;

class Salida extends Model
{
    protected $tabla = 'detalle_salida';
    protected $id = 'id_detalle_salida';

    protected $relaciones = [
        'producto' => 'id_producto',
        'salida' => 'id_salida'
    ];

    public function actualizar($datosForm)
    {
    }

    public function destruir($id)
    {
    }

    public function guardar($datosForm)
    {
        if($datosForm['stock_actual'] - $datosForm['cantidad_salida'] < 0) {
            parent::redirigir('salidas/crear?error=cantidad');
        }

        $querySalida = "INSERT INTO salida (cantidad_salida, fecha_salida) VALUES (:cantidad_salida, default)";

        $queryDetalles = "INSERT INTO {$this->tabla} 
        (id_producto, id_salida, precio_salida, motivo) 
        VALUES 
        (:id_producto, :id_salida, :precio_salida, :motivo)";

        $queryProducto = "UPDATE producto SET stock = stock - :cantidad_salida WHERE id_producto = :id_producto";
        try {
            $this->db->beginTransaction();
            // Hace el insert en la tabla de salida
            $salida = $this->db->prepare($querySalida);
            $salida->bindParam(":cantidad_salida", $datosForm['cantidad_salida']);
            $salida->execute();

            $id = $this->db->lastInsertId();

            $detalles = $this->db->prepare($queryDetalles);
            $detalles->bindParam(":id_producto", $datosForm['id_producto']);
            $detalles->bindParam(":id_salida", $id);
            $detalles->bindParam(":precio_salida", $datosForm['precio_salida']);
            $detalles->bindParam(":motivo", $datosForm['motivo']);
            $detalles->execute();

            $producto = $this->db->prepare($queryProducto);
            $producto->bindParam(":id_producto", $datosForm['id_producto']);
            $producto->bindParam(":cantidad_salida", $datosForm['cantidad_salida']);
            $producto->execute();

            $this->db->commit();

            return true;
        } catch (\Throwable $th) {
            $this->db->rollBack();

            return false;
        }
    }

    public function productoMasVendido()
    {
        $motivo = Motivo::SOLD;

        $sql = "SELECT p.*
                FROM producto p
                INNER JOIN detalle_salida ds ON p.id_producto = ds.id_producto
                INNER JOIN salida s ON ds.id_salida = s.id_salida
                WHERE ds.motivo = $motivo
                GROUP BY p.id_producto
                ORDER BY SUM(s.cantidad_salida) DESC
                LIMIT 1";

        // Preparar la consulta
        $stmt = $this->db->prepare($sql);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener todos los registros como un arreglo asociativo
        $resultados = $stmt->fetch();

        return $resultados;
    }

    public function productoMenosVendido()
    {
        $motivo = Motivo::SOLD;

        $sql = "SELECT p.*
                FROM producto p
                INNER JOIN detalle_salida ds ON p.id_producto = ds.id_producto
                INNER JOIN salida s ON ds.id_salida = s.id_salida
                WHERE ds.motivo = $motivo
                GROUP BY p.id_producto
                ORDER BY SUM(s.cantidad_salida) ASC
                LIMIT 1";

        // Preparar la consulta
        $stmt = $this->db->prepare($sql);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener todos los registros como un arreglo asociativo
        $resultados = $stmt->fetch();

        return $resultados;
    }

    public function ultimaSalida()
    {
        $sql = "SELECT *
        FROM salida s
        INNER JOIN detalle_salida ds ON s.id_salida = ds.id_salida
        INNER JOIN producto p ON p.id_producto = ds.id_producto
        ORDER BY s.id_salida DESC
        LIMIT 1";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $salida = $stmt->fetch();
        return $salida;
    }
}
