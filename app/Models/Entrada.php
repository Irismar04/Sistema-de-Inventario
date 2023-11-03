<?php

namespace App\Models;

class Entrada extends Model
{
    protected $tabla = 'detalle_entrada';
    protected $id = 'id_detalle_entrada';

    protected $relaciones = [
        'producto' => 'id_producto',
        'entrada' => 'id_entrada',
        'divisa' => 'id_divisa'
    ];

    public function todos()
    {
        // Consulta para buscar todos los registros en la tabla deseada
        $sql = "SELECT *, divisa.cantidad as divisa_precio FROM {$this->tabla} 
        LEFT JOIN producto ON producto.id_producto = {$this->tabla}.id_producto
        LEFT JOIN entrada ON entrada.id_entrada = {$this->tabla}.id_entrada
        LEFT JOIN divisa ON entrada.id_divisa = divisa.id_divisa
        GROUP BY entrada.id_entrada";

        $sql .= " ORDER BY {$this->tabla}.{$this->id} DESC";

        // Preparar la consulta
        $stmt = $this->db->prepare($sql);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener todos los registros como un arreglo asociativo
        $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $resultados;
    }

    public function actualizar($datosForm)
    {
    }

    public function destruir($id)
    {
    }

    public function guardar($datosForm)
    {
        $queryEntrada = "INSERT INTO entrada (id_divisa, cantidad_entrada, fecha_entrada) VALUES (:id_divisa, :cantidad_entrada, default)";
        try {
            $this->db->beginTransaction();

            $divisa = (new Divisa())->ultima();
            // Hace el insert en la tabla de entrada
            $entrada = $this->db->prepare($queryEntrada);
            $entrada->bindParam(":id_divisa", $divisa['id_divisa']);
            $entrada->bindParam(":cantidad_entrada", $datosForm['cantidad_entrada']);
            $entrada->execute();

            $id = $this->db->lastInsertId();

            $queryDetalles = "INSERT INTO {$this->tabla} 
            (id_producto, id_entrada, fecha_vencimiento, precio_entrada) 
            VALUES 
            (:id_producto, :id_entrada, :fecha_vencimiento, :precio_entrada)";

            $detalles = $this->db->prepare($queryDetalles);
            $detalles->bindParam(":id_producto", $datosForm['id_producto']);
            $detalles->bindParam(":id_entrada", $id);
            $detalles->bindParam(":fecha_vencimiento", $datosForm['fecha_vencimiento']);
            $detalles->bindParam(":precio_entrada", $datosForm['precio_entrada']);
            $detalles->execute();

            $queryProducto = "UPDATE producto SET stock = stock + :cantidad_entrada WHERE id_producto = :id_producto";

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
