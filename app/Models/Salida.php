<?php

namespace App\Models;

class Salida extends Model
{
    protected $tabla = 'detalle_salida';
    protected $id = 'id_detalle_e';

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
}
