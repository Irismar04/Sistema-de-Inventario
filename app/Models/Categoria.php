<?php

namespace App\Models;

use PDO;

class Categoria extends Model
{
    protected $tabla = 'categoria';

    public function revisarDuplicados($datosForm, $vista)
    {

        // Revisa si el formulario tiene un id(si tiene un id, es un formulario de editar)

        if (isset($datosForm['id'])) {
            $sql = "SELECT * FROM {$this->tabla}
            WHERE nom_categoria LIKE :nom_categoria AND
            NOT id_categoria = :id_categoria" ;

        }
        //si no tiene id, es un formulario de crear
        else {
            $sql = "SELECT * FROM {$this->tabla} WHERE nom_categoria LIKE :nom_categoria";
        }

        // Ejecuta la sentencia SQL y revisa de que este correcta

        $columnaUno = $this->db->prepare($sql);

        //Si existe un id, lo introduce en la setencia SQL
        if (isset($datosForm['id'])) {
            $columnaUno->bindParam(":id_categoria", $datosForm['id']);
        }

        $nombre = "%" .$datosForm['nombre']."%";
        $columnaUno->bindParam(":nom_categoria", $nombre);
        $columnaUno->execute();


        //Revisa si hay una categoria con ese nombre, si hay, la redirige con error
        if ($columnaUno->rowCount() > 0) {
            parent::redirigir("categorias/{$vista}?error=nombre&id={$datosForm['id']}");
        }
    }

    public function guardar($datosForm)
    {
        $this->revisarDuplicados($datosForm, 'crear');

        //Si no, sigue el flujo normal del programa

        $query = "INSERT INTO {$this->tabla} (nom_categoria) VALUES (:nom_categoria)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":nom_categoria", $datosForm['nombre']);
        $statement->execute();

        return $statement->rowCount() > 0;
    }

    public function actualizar($datosForm)
    {
        $this->revisarDuplicados($datosForm, 'editar');


        $this->revisarDuplicados($datosForm, 'editar');


        $query = "UPDATE {$this->tabla} SET nom_categoria = :nuevo_nombre WHERE id_categoria = :id_categoria";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":nuevo_nombre", $datosForm['nombre']);
        $statement->bindParam(":id_categoria", $datosForm['id']);
        $statement->execute();

        return $statement->rowCount() > 0;
    }

    public function uno($id)
    {
        // Consulta para buscar el registro por su ID en la tabla deseada
        $sql = "SELECT * FROM {$this->tabla} WHERE id_categoria = :id_categoria";

        // Preparar la consulta
        $stmt = $this->db->prepare($sql);

        // Asignar el valor del parámetro :id
        $stmt->bindParam(':id_categoria', $id, PDO::PARAM_INT);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el registro como un arreglo asociativo
        $registro = $stmt->fetch(PDO::FETCH_ASSOC);

        return $registro;
    }

    public function destruir($id)
    {
        $sql = "DELETE FROM categoria WHERE id_categoria = :id_categoria";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':id_categoria', $id);
        $statement->execute();
    }
}
