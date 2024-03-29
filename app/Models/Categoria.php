<?php

namespace App\Models;

use App\Constants\Acciones;
use App\Constants\Status;
use App\Traits\Desactivable;
use App\Traits\Registrable;

class Categoria extends Model
{
    use Desactivable;
    use Registrable;

    protected $tabla = 'categoria';

    protected $id = 'id_categoria';

    public function revisarDuplicados($datosForm, $vista)
    {

        // Revisa si el formulario tiene un id(si tiene un id, es un formulario de editar)
        if (isset($datosForm['id'])) {
            $sql = "SELECT * FROM {$this->tabla}
            WHERE nom_categoria LIKE :nom_categoria AND
            NOT id_categoria = :id_categoria";

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

        $nombre = "{$datosForm['nombre']}%";
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

        $datosForm['nombre'] = strtolower($datosForm['nombre']);

        $query = "INSERT INTO {$this->tabla} (nom_categoria, estado) VALUES (:nom_categoria, default)";
        $statement = $this->db->prepare($query);
        $nuevoNombre = ucfirst($datosForm['nombre']);
        $statement->bindParam(":nom_categoria", $nuevoNombre);
        $statement->execute();

        $this->registrar(Acciones::CREATE);

        return $statement->rowCount() > 0;
    }

    public function actualizar($datosForm)
    {
        $this->revisarDuplicados($datosForm, 'editar');

        $datosForm['nombre'] = strtolower($datosForm['nombre']);

        $query = "UPDATE {$this->tabla} SET nom_categoria = :nuevo_nombre WHERE id_categoria = :id_categoria";
        $statement = $this->db->prepare($query);
        $nuevoNombre = ucfirst($datosForm['nombre']);
        $statement->bindParam(":nuevo_nombre", $nuevoNombre);
        $statement->bindParam(":id_categoria", $datosForm['id']);
        $statement->execute();

        $this->registrar(Acciones::UPDATE);
        return $statement->rowCount() > 0;
    }
}
