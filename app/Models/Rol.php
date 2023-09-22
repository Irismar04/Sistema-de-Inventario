<?php 

namespace App\Models;

use PDO; 

/**
 * 
 */
class Rol extends Model
{ 
	protected $tabla = 'rol';
	
	public function guardar($datosForm){}

	public function actualizar($datosForm){}

	public function destruir($id){}

	public function uno($id)

{
	//Consulta para buscar elregistro por su ID en la tabla deseada 

	$sql = "SELECT * FROM {$this->tabla} WHERE id_rol = :id_rol";

	// Prepararla consulta 
	$stmt = $this->db->prepare($sql);

	// Asignar el valor del parametro :id

	$stmt->bindParam(':id_rol', $id, PDO::PARAM_INT);

	// Ejecutar la consulta 

	$stmt->execute(); 

	//Obtener el registro como un arregl asociativo 

	$registro = $stmt->fetch(PDO::FETCH_ASSOC);

	return $registro;
	}
}



?>