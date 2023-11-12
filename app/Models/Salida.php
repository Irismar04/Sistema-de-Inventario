<?php

namespace App\Models;

use App\Constants\Acciones;
use App\Constants\Motivo;
use App\Traits\Registrable;

class Salida extends Model
{
    use Registrable;

    protected $tabla = 'detalle_salida';
    protected $id = 'id_detalle_salida';

    protected $relaciones = [
        'producto' => 'id_producto',
        'salida' => 'id_salida'
    ];


    public function todos()
    {
        // Consulta para buscar todos los registros en la tabla deseada
        $sql = "SELECT *, divisa.cantidad as divisa_precio 
        FROM {$this->tabla} 
        LEFT JOIN producto ON producto.id_producto = {$this->tabla}.id_producto
        LEFT JOIN salida ON salida.id_salida = {$this->tabla}.id_salida
        LEFT JOIN divisa ON salida.id_divisa = divisa.id_divisa
        ";

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

    public function destruir($datosForm)
    {
        if($datosForm['stock_actual'] - $datosForm['cantidad_salida'] < 0) {
            parent::redirigir('salidas?error=cantidad');
        }

        try {
            $this->db->beginTransaction();

            $queryDetalles = "DELETE FROM {$this->tabla} WHERE {$this->id} = :{$this->id}";

            $detalles = $this->db->prepare($queryDetalles);
            $detalles->bindParam(":id_detalle_salida", $datosForm['id_detalle_salida']);
            $detalles->execute();

            $querySalida = "DELETE FROM salida WHERE id_salida = :id_salida";
            $salida = $this->db->prepare($querySalida);
            $salida->bindParam(":id_salida", $datosForm['id_salida']);
            $salida->execute();

            $queryProducto = "UPDATE producto SET stock = stock + :cantidad_salida WHERE id_producto = :id_producto";

            $producto = $this->db->prepare($queryProducto);
            $producto->bindParam(":id_producto", $datosForm['id_producto']);
            $producto->bindParam(":cantidad_salida", $datosForm['cantidad_salida']);
            $producto->execute();

            $this->db->commit();

            $this->registrar(Acciones::DELETE, 'salida');

            return true;
        } catch (\Throwable $th) {
            $this->db->rollBack();

            return false;
        }
    }

    public function guardar($datosForm)
    {
        if($datosForm['stock_actual'] - $datosForm['cantidad_salida'] < 0) {
            parent::redirigir('salidas/crear?error=cantidad');
        }

        $querySalida = "INSERT INTO salida (id_divisa, cantidad_salida, fecha_salida) VALUES (:id_divisa, :cantidad_salida, default)";

        try {
            $this->db->beginTransaction();

            $divisa = (new Divisa())->ultima();
            // Hace el insert en la tabla de salida
            $salida = $this->db->prepare($querySalida);
            $salida->bindParam(":id_divisa", $divisa['id_divisa']);
            $salida->bindParam(":cantidad_salida", $datosForm['cantidad_salida']);
            $salida->execute();

            $id = $this->db->lastInsertId();

            $queryDetalles = "INSERT INTO {$this->tabla} 
            (id_producto, id_salida, precio_salida, motivo) 
            VALUES 
            (:id_producto, :id_salida, :precio_salida, :motivo)";

            $detalles = $this->db->prepare($queryDetalles);
            $detalles->bindParam(":id_producto", $datosForm['id_producto']);
            $detalles->bindParam(":id_salida", $id);
            $detalles->bindParam(":precio_salida", $datosForm['precio_salida']);
            $detalles->bindParam(":motivo", $datosForm['motivo']);
            $detalles->execute();

            $queryProducto = "UPDATE producto SET stock = stock - :cantidad_salida WHERE id_producto = :id_producto";

            $producto = $this->db->prepare($queryProducto);
            $producto->bindParam(":id_producto", $datosForm['id_producto']);
            $producto->bindParam(":cantidad_salida", $datosForm['cantidad_salida']);
            $producto->execute();

            $this->db->commit();

            $this->registrar(Acciones::CREATE, 'salida');

            return true;
        } catch (\Throwable $th) {
            $this->db->rollBack();

            return false;
        }
    }

    public function productoMasVendido()
    {
        $motivo = Motivo::SOLD;

        $sql = "SELECT p.nom_producto
                FROM producto p
                LEFT JOIN detalle_salida ds ON p.id_producto = ds.id_producto
                LEFT JOIN salida s ON ds.id_salida = s.id_salida
                WHERE ds.motivo = $motivo
                GROUP BY p.id_producto, p.nom_producto
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

        $sql = "SELECT p.nom_producto
                FROM producto p
                INNER JOIN detalle_salida ds ON p.id_producto = ds.id_producto
                INNER JOIN salida s ON ds.id_salida = s.id_salida
                WHERE ds.motivo = $motivo
                GROUP BY p.id_producto, p.nom_producto
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

    public function todosPorFecha($parametros)
    {
        // Consulta para buscar todos los registros en la tabla deseada
        $sql = "SELECT *, divisa.cantidad as divisa_precio 
        FROM {$this->tabla} 
        LEFT JOIN producto ON producto.id_producto = {$this->tabla}.id_producto
        LEFT JOIN salida ON salida.id_salida = {$this->tabla}.id_salida
        LEFT JOIN divisa ON salida.id_divisa = divisa.id_divisa
        WHERE DATE(salida.fecha_salida) BETWEEN :desde AND :hasta
        ";

        $sql .= " ORDER BY {$this->tabla}.{$this->id} DESC";

        // Preparar la consulta
        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(":desde", $parametros['desde']);
        $stmt->bindParam(":hasta", $parametros['hasta']);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener todos los registros como un arreglo asociativo
        $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $resultados;
    }
}
