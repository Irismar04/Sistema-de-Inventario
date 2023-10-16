<?php

namespace Inventario\Database;

use Inventario\App;

class Login
{
    protected $db;

    protected $tabla;

    public function __construct()
    {
        $this->db = App::db();
    }

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
            $contrasena = $datos['contrasena'];

            // Consulta SQL para verificar usuario y contraseña
            $sql = "SELECT * FROM usuario WHERE nom_usuario = :usuario AND clave = :contrasena";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':contrasena', hash('sha256', $contrasena));
            $stmt->execute();

            // Verificar si el usuario existe en la base de datos
            if ($stmt->rowCount() == 1) {
                // Iniciar sesión y almacenar el nombre de usuario en la variable de sesión
                $_SESSION['usuario'] = $usuario;
                return true;
            } else {
                return false;
            }
        }
    }

    public function cerrarSesion()
    {
        unset($SESSION['usuario']);
        session_destroy();
    }
}
