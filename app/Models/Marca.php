<?php

namespace App\Models;

use App\Constants\Acciones;
use App\Constants\Status;
use App\Traits\Desactivable;
use App\Traits\Registrable;

class Marca extends Model
{
    use Desactivable;
    use Registrable;

    protected $tabla = 'marca';

    protected $id = 'id_marca';

    public function revisarDuplicados($datosForm, $vista)
    {

        // Revisa si el formulario tiene un id(si tiene un id, es un formulario de editar)

        if (isset($datosForm['id'])) {
            $sql = "SELECT * FROM {$this->tabla}
            WHERE nom_marca LIKE :nom_marca AND
            NOT id_marca = :id_marca";

        }
        //si no tiene id, es un formulario de crear
        else {
            $sql = "SELECT * FROM {$this->tabla} WHERE nom_marca LIKE :nom_marca";
        }

        // Ejecuta la sentencia SQL y revisa de que este correcta

        $columnaUno = $this->db->prepare($sql);

        //Si existe un id, lo introduce en la setencia SQL
        if (isset($datosForm['id'])) {
            $columnaUno->bindParam(":id_marca", $datosForm['id']);
        }


        $nombre = "{$datosForm['nombre']}%";
        $columnaUno->bindParam(":nom_marca", $nombre);
        $columnaUno->execute();


        //Revisa si hay una marca con ese nombre, si hay, la redirige con error
        if ($columnaUno->rowCount() > 0) {
            parent::redirigir("marcas/{$vista}?error=nombre&id={$datosForm['id']}");
        }
    }

    public function guardar($datosForm)
    {
        $this->revisarDuplicados($datosForm, 'crear');

        $query = "INSERT INTO {$this->tabla} (nom_marca, estado) VALUES (:nom_marca, default)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":nom_marca", $datosForm['nombre']);
        $statement->execute();

        $this->registrar(Acciones::CREATE);

        return $statement->rowCount() > 0;
    }

    public function actualizar($datosForm)
    {
        $this->revisarDuplicados($datosForm, 'editar');
        $query = "UPDATE {$this->tabla} SET nom_marca = :nuevo_nombre WHERE id_marca = :id_marca";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":nuevo_nombre", $datosForm['nombre']);
        $statement->bindParam(":id_marca", $datosForm['id']);
        $statement->execute();

        $this->registrar(Acciones::UPDATE);

        return $statement->rowCount() > 0;
    }
}
