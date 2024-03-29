<?php

namespace App\Models;

use App\Constants\Acciones;
use App\Traits\Registrable;

class Entrada extends Model
{
    use Registrable;

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
        if($datosForm['stock_actual'] - $datosForm['cantidad_entrada'] < 0) {
            parent::redirigir('entradas?error=cantidad');
        }

        try {
            $this->db->beginTransaction();

            $queryDetalles = "DELETE FROM {$this->tabla} WHERE {$this->id} = :{$this->id}";

            $detalles = $this->db->prepare($queryDetalles);
            $detalles->bindParam(":id_detalle_entrada", $datosForm['id_detalle_entrada']);
            $detalles->execute();

            $queryEntrada = "DELETE FROM entrada WHERE id_entrada = :id_entrada";
            // Hace el insert en la tabla de entrada
            $entrada = $this->db->prepare($queryEntrada);
            $entrada->bindParam(":id_entrada", $datosForm['id_entrada']);
            $entrada->execute();

            $queryProducto = "UPDATE producto SET stock = stock - :cantidad_entrada WHERE id_producto = :id_producto";

            $producto = $this->db->prepare($queryProducto);
            $producto->bindParam(":id_producto", $datosForm['id_producto']);
            $producto->bindParam(":cantidad_entrada", $datosForm['cantidad_entrada']);
            $producto->execute();

            $this->db->commit();

            $this->registrar(Acciones::DELETE, 'entrada');

            return true;
        } catch (\Throwable $th) {
            $this->db->rollBack();

            return false;
        }
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

            $this->registrar(Acciones::CREATE, 'entrada');

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

    public function todosConFiltros($parametros)
    {
        // Consulta para buscar todos los registros en la tabla deseada
        $sql = "SELECT *, divisa.cantidad as divisa_precio FROM {$this->tabla} 
        LEFT JOIN producto ON producto.id_producto = {$this->tabla}.id_producto
        LEFT JOIN entrada ON entrada.id_entrada = {$this->tabla}.id_entrada
        LEFT JOIN divisa ON entrada.id_divisa = divisa.id_divisa
        WHERE DATE(entrada.fecha_entrada) BETWEEN :desde AND :hasta
        ";

        // Parametros opcionales
        $categoriaExiste = isset($parametros['categoria']) && $parametros['categoria'] != 'null';
        $marcaExiste = isset($parametros['marca']) && $parametros['marca'] != 'null';
        if($categoriaExiste) {
            $sql .= " AND producto.id_categoria = :categoria";
        }

        if($marcaExiste) {
            $sql .= " AND producto.id_marca = :marca";
        }

        // Orden de las entradas
        $sql .= " ORDER BY {$this->tabla}.{$this->id} DESC";

        // Preparar la consulta
        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(":desde", $parametros['desde']);
        $stmt->bindParam(":hasta", $parametros['hasta']);

        if($categoriaExiste) {
            $stmt->bindParam(":categoria", $parametros['categoria']);
        }

        if($marcaExiste) {
            $stmt->bindParam(":marca", $parametros['marca']);
        }

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener todos los registros como un arreglo asociativo
        $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $resultados;
    }
}
