<?php

namespace App\Models;

use App\Constants\Status;
use App\Traits\Autenticable;
use App\Traits\Desactivable;

class Usuario extends Model
{
    use Desactivable;
    use Autenticable;

    protected $tabla = 'usuario';
    protected $id = 'id_usuario';

    protected $relaciones = [
        'rol' => 'id_rol',
        'datos' => 'id_usuario'
    ];

    public function revisarDuplicados($datosForm, $vista)
    {

        // Revisa si el formulario tiene un id(si tiene un id, es un formulario de editar)
        $borrado = Status::DELETED;
        if (isset($datosForm['id'])) {
            $sql = "SELECT * FROM {$this->tabla}
            WHERE nom_usuario LIKE :nom_usuario AND
            NOT id_usuario = :id_usuario AND estado != $borrado";

        }
        //si no tiene id, es un formulario de crear
        else {
            $sql = "SELECT * FROM {$this->tabla} WHERE nom_usuario LIKE :nom_usuario AND estado != $borrado";
        }

        // Ejecuta la sentencia SQL y revisa de que este correcta

        $columnaUno = $this->db->prepare($sql);

        //Si existe un id, lo introduce en la setencia SQL
        if (isset($datosForm['id'])) {
            $columnaUno->bindParam(":id_usuario", $datosForm['id']);
        }

        $nombre = "{$datosForm['username']}%";
        $nombre = strtolower($nombre);
        $columnaUno->bindParam(":nom_usuario", $nombre);
        $columnaUno->execute();

        if (isset($datosForm['id'])) {
            $sql = "SELECT * FROM {$this->tabla}
            LEFT JOIN datos ON datos.id_usuario = usuario.id_usuario
            WHERE cedula LIKE :cedula AND
            NOT usuario.id_usuario = :id_usuario AND estado != $borrado";

        }
        //si no tiene id, es un formulario de crear
        else {
            $sql = "SELECT * FROM {$this->tabla} LEFT JOIN datos ON datos.id_usuario = usuario.id_usuario WHERE cedula = :cedula AND estado != $borrado";
        }

        // Ejecuta la sentencia SQL y revisa de que este correcta

        $columnaDos = $this->db->prepare($sql);

        //Si existe un id, lo introduce en la setencia SQL
        if (isset($datosForm['id'])) {
            $columnaDos->bindParam(":id_usuario", $datosForm['id']);
        }

        $cedula = "{$datosForm['cedula']}%";
        $cedula = strtolower($cedula);
        $columnaDos->bindParam(":cedula", $cedula);
        $columnaDos->execute();

        if ($columnaUno->rowCount() > 0) {
            parent::redirigir("usuarios/{$vista}?error=nombre&id={$datosForm['id']}");
        }

        if ($columnaDos->rowCount() > 0) {
            parent::redirigir("usuarios/{$vista}?error=cedula&id={$datosForm['id']}");
        }
    }

    public function guardar($datosForm)
    {
        $this->revisarDuplicados($datosForm, 'crear');

        $queryUsuario = "INSERT INTO {$this->tabla}
                            (id_rol, nom_usuario, clave, estado) 
                        VALUES 
                            (:id_rol, :nom_usuario, :clave, default)";

        $queryDatos = "INSERT INTO datos
        (id_usuario, nom_per, apellido_per, cedula, genero, direccion, telefono, correo) 
        VALUES 
        (:id_usuario, :nom_per, :apellido_per, :cedula, :genero, :direccion, :telefono, :correo)";

        try {
            $this->db->beginTransaction();

            $usuario = $this->db->prepare($queryUsuario);
            $usuario->bindParam(":id_rol", $datosForm['roles']);
            $usuario->bindParam(":nom_usuario", $datosForm['username']);
            $usuario->bindParam(":clave", $datosForm['password']);
            $usuario->execute();

            $id = $this->db->lastInsertId();

            $datos = $this->db->prepare($queryDatos);
            $datos->bindParam(":id_usuario", $id);
            $datos->bindParam(":nom_per", $datosForm['nombre']);
            $datos->bindParam(":apellido_per", $datosForm['apellido']);
            $datos->bindParam(":cedula", $datosForm['cedula']);
            $datos->bindParam(":genero", $datosForm['generos']);
            $datos->bindParam(":direccion", $datosForm['direccion']);
            $datos->bindParam(":telefono", $datosForm['telefono']);
            $datos->bindParam(":correo", $datosForm['correo']);
            $datos->execute();

            $this->db->commit();

            return true;
        } catch (\Throwable $th) {
            $this->db->rollBack();
            return false;
        }
    }

    public function actualizar($datosForm)
    {
        $this->revisarDuplicados($datosForm, 'editar');

        $queryUsuario = "UPDATE {$this->tabla} SET
                            id_rol = :id_rol,
                            nom_usuario = :nom_usuario
                        WHERE id_usuario = :id_usuario";

        $queryDatos = "UPDATE datos SET
                            nom_per = :nom_per,
                            apellido_per = :apellido_per,
                            cedula = :cedula,
                            genero = :genero,
                            direccion = :direccion,
                            telefono = :telefono,
                            correo = :correo
                        WHERE id_usuario = :id_usuario";

        try {
            $this->db->beginTransaction();

            $usuario = $this->db->prepare($queryUsuario);
            $usuario->bindParam(":id_usuario", $datosForm['id']);
            $usuario->bindParam(":id_rol", $datosForm['roles']);
            $usuario->bindParam(":nom_usuario", $datosForm['username']);
            $usuario->execute();

            $datos = $this->db->prepare($queryDatos);
            $datos->bindParam(":id_usuario", $datosForm['id']);
            $datos->bindParam(":nom_per", $datosForm['nombre']);
            $datos->bindParam(":apellido_per", $datosForm['apellido']);
            $datos->bindParam(":cedula", $datosForm['cedula']);
            $datos->bindParam(":genero", $datosForm['generos']);
            $datos->bindParam(":direccion", $datosForm['direccion']);
            $datos->bindParam(":telefono", $datosForm['telefono']);
            $datos->bindParam(":correo", $datosForm['correo']);
            $datos->execute();

            $this->db->commit();

            return true;
        } catch (\Throwable $th) {
            $this->db->rollBack();
            return false;
        }
    }

    public function uno($id)
    {
        // Consulta para buscar el registro por su ID en la tabla deseada
        $sql = "SELECT * FROM {$this->tabla} LEFT JOIN datos ON datos.id_usuario = usuario.id_usuario WHERE usuario.{$this->id} = :{$this->id}";

        // Preparar la consulta
        $stmt = $this->db->prepare($sql);

        // Asignar el valor del parámetro :id
        $stmt->bindParam($this->id, $id, \PDO::PARAM_INT);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el registro como un arreglo asociativo
        $registro = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $registro;
    }

    public function destruir($id)
    {

    }

    public function todosSinBorrar()
    {
        $borrado = Status::DELETED;
        $estado = "{$this->tabla}.estado";
        // Consulta para buscar todos los registros en la tabla deseada
        $sql = "SELECT *, usuario.id_usuario as id_usuario FROM {$this->tabla}";

        foreach ($this->relaciones as $tabla => $columna) {
            $sql .= " LEFT JOIN {$tabla} ON {$tabla}.{$columna} = {$this->tabla}.{$columna}";
        }

        $sql .= " WHERE {$estado} != {$borrado}";

        // Preparar la consulta
        $stmt = $this->db->prepare($sql);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener todos los registros como un arreglo asociativo
        $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $resultados;
    }
}
