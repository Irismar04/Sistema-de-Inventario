<?php

namespace App\Traits;

use App\Constants\Status;

trait Autenticable
{
    public function iniciarSesion($datos)
    {
        // Verificar si el usuario ya ha iniciado sesión
        if(isset($_SESSION['usuario'])) {
            return "Ya has iniciado sesión como: " . $_SESSION['usuario'];
        }

        // Verificar si se han enviado los datos del formulario
        if(isset($datos['usuario']) && isset($datos['contrasena'])) {
            // Obtener datos del formulario
            $usuario = $datos['usuario'];
            $contrasena = hash('sha256', $datos['contrasena']);
            $estado = Status::ACTIVE;

            // Consulta SQL para verificar usuario y contraseña
            $sql = "SELECT id_usuario, nom_usuario, nom_rol, estado FROM usuario LEFT JOIN rol ON rol.id_rol = usuario.id_rol WHERE nom_usuario = :usuario AND clave = :contrasena AND estado = :estado LIMIT 1";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':contrasena', $contrasena);
            $stmt->bindParam(':estado', $estado);
            $stmt->execute();
            $user = $stmt->fetch();

            // Verificar si el usuario existe en la base de datos
            if ($stmt->rowCount() == 1) {
                // Iniciar sesión y almacenar el nombre de usuario en la variable de sesión
                $_SESSION['usuario'] = $user;
                return true;
            } else {
                return false;
            }
        }
    }

    public function cerrarSesion()
    {
        session_destroy();
    }
}
