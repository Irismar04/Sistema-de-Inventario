<?php

namespace App\Models;

use App\Constants\Acciones;
use App\Constants\Status;
use App\Traits\Desactivable;
use App\Traits\Registrable;

class Producto extends Model
{
    use Desactivable;
    use Registrable;

    protected $tabla = 'producto';
    protected $id = 'id_producto';

    protected $relaciones = [
        'categoria' => 'id_categoria',
        'marca' => 'id_marca'
    ];

    public function todosActivos()
    {
        $activo = Status::ACTIVE;
        $estado = "{$this->tabla}.estado";
        $sql = "SELECT {$this->tabla}.*, categoria.nom_categoria, marca.nom_marca  FROM {$this->tabla}";

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

    public function revisarDuplicados($datosForm, $vista)
    {

        // Revisa si el formulario tiene un id(si tiene un id, es un formulario de editar)
        if (isset($datosForm['id'])) {
            $sql = "SELECT * FROM {$this->tabla}
            WHERE nom_producto LIKE :nom_producto AND
            NOT id_producto = :id_producto";

        }
        //si no tiene id, es un formulario de crear
        else {
            $sql = "SELECT * FROM {$this->tabla} WHERE nom_producto LIKE :nom_producto";
        }

        // Ejecuta la sentencia SQL y revisa de que este correcta

        $columnaUno = $this->db->prepare($sql);

        //Si existe un id, lo introduce en la setencia SQL
        if (isset($datosForm['id'])) {
            $columnaUno->bindParam(":id_producto", $datosForm['id']);
        }

        $nombre = "{$datosForm['nombre']}%";
        $nombre = strtolower($nombre);
        $columnaUno->bindParam(":nom_producto", $nombre);
        $columnaUno->execute();


        //Revisa si hay una producto con ese nombre, si hay, la redirige con error
        if ($columnaUno->rowCount() > 0) {
            parent::redirigir("productos/{$vista}?error=nombre&id={$datosForm['id']}");
        }
    }

    public function guardar($datosForm)
    {
        $this->revisarDuplicados($datosForm, 'crear');

        $datosForm['nombre'] = strtolower($datosForm['nombre']);

        $query =
        "INSERT INTO {$this->tabla}
        (id_categoria, id_marca, nom_producto, stock, stock_minimo, precio, estado)
        VALUES 
        (:id_categoria, :id_marca, :nom_producto, :stock, :stock_minimo, :precio, default)";


        $statement = $this->db->prepare($query);

        $statement->bindParam(":id_categoria", $datosForm['categorias']);
        $statement->bindParam(":id_marca", $datosForm['marcas']);
        $statement->bindParam(":nom_producto", $datosForm['nombre']);
        $statement->bindParam(":stock", $datosForm['stock']);
        $statement->bindParam(":stock_minimo", $datosForm['stock_minimo']);
        $statement->bindParam(':precio', $datosForm['precio']);

        $statement->execute();

        $this->registrar(Acciones::CREATE);

        return $statement->rowCount() > 0;
    }

    public function actualizar($datosForm)
    {
        $this->revisarDuplicados($datosForm, 'editar');

        $datosForm['nombre'] = strtolower($datosForm['nombre']);

        $query = "UPDATE {$this->tabla} SET 
        nom_producto = :nuevo_nombre,
        id_categoria = :id_categoria,
        id_marca = :id_marca,
        stock_minimo = :stock_minimo,
        precio = :precio
        WHERE id_producto = :id_producto";

        $statement = $this->db->prepare($query);
        $statement->bindParam(":id_producto", $datosForm['id']);

        $statement->bindParam(":nuevo_nombre", $datosForm['nombre']);
        $statement->bindParam(":id_categoria", $datosForm['categorias']);
        $statement->bindParam(":id_marca", $datosForm['marcas']);
        $statement->bindParam(":stock_minimo", $datosForm['stock_minimo']);
        $statement->bindParam(':precio', $datosForm['precio']);

        $statement->execute();

        $this->registrar(Acciones::UPDATE);

        return $statement->rowCount() > 0;
    }

    public function todosDebajoDeStockMinimo()
    {
        $sql = "SELECT *
        FROM producto
        WHERE stock < stock_minimo";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function ultimoProducto()
    {
        $sql = "SELECT *
        FROM producto
        ORDER BY id_producto DESC
        LIMIT 1";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $producto = $stmt->fetch();
        return $producto;
    }

    public function todosInactivos()
    {
        $inactivo = Status::INACTIVE;
        $estado = "{$this->tabla}.estado";
        $sql = "SELECT producto.*, marca.nom_marca, categoria.nom_categoria FROM {$this->tabla}";

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

    public function todosPorCategoria($id)
    {
        $activo = Status::ACTIVE;
        $estado = "{$this->tabla}.estado";
        $sql = "SELECT producto.*, marca.nom_marca, categoria.nom_categoria FROM {$this->tabla}";

        foreach ($this->relaciones as $tabla => $columna) {
            $sql .= " LEFT JOIN {$tabla} ON {$tabla}.{$columna} = {$this->tabla}.{$columna}";
        }

        $sql .= " WHERE {$estado} = {$activo} AND producto.id_categoria = {$id}";
        // Preparar la consulta
        $stmt = $this->db->prepare($sql);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener todos los registros como un arreglo asociativo
        $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function todosConFiltros($parametros)
    {
        $sql = "SELECT producto.*, marca.nom_marca, categoria.nom_categoria FROM {$this->tabla}";

        foreach ($this->relaciones as $tabla => $columna) {
            $sql .= " LEFT JOIN {$tabla} ON {$tabla}.{$columna} = {$this->tabla}.{$columna}";
        }

        $sql .= " WHERE {$this->tabla}.estado = :estado AND DATE(producto.creado_en) BETWEEN :desde AND :hasta";

        // Parametros opcionales
        $categoriaExiste = isset($parametros['categoria']) && $parametros['categoria'] != 'null';
        $marcaExiste = isset($parametros['marca']) && $parametros['marca'] != 'null';
        if($categoriaExiste) {
            $sql .= " AND {$this->tabla}.id_categoria = :categoria";
        }

        if($marcaExiste) {
            $sql .= " AND {$this->tabla}.id_marca = :marca";
        }
        // Preparar la consulta
        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(":desde", $parametros['desde']);
        $stmt->bindParam(":hasta", $parametros['hasta']);
        $stmt->bindParam(":estado", $parametros['estado']);

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
