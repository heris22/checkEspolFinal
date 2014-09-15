<?php

include_once('databaseControlador.php');
include_once('comedorClase.php');


class ComedorControlador extends DataBaseControlador 
{

	function mostrarComedores() {
		$rows = self::$db->getRows("SELECT * FROM comedor");        
    	$arrayComedor= array();    
        foreach ($rows as $c){
          $comedorAuxiliar = new Comedor($c{'idcomedor'},$c{'nombre'},$c{'descripcion'},$c{'imagen'});
          array_push($arrayComedor, $comedorAuxiliar);
        }
   		return $arrayComedor;       
	}

  function mostrarComedoresJson() {
        $rows = self::$db->getRows("SELECT * FROM comedor");        
        return json_encode($rows);       
    }

	function eliminarComedor($id) {    
    $deleterow = self::$db->deleteRow("DELETE FROM prueba.comedor WHERE idcomedor= ?", array("{$id}"));
  }  

	function actualizarComedor($idComedor,$nombre,$descripcion,$imagen) {    
    $insertrow = self::$db->updateRow("UPDATE prueba.comedor SET comedor.nombre = ?, comedor.descripcion = ?, comedor.imagen = ?  WHERE comedor.idcomedor = ? ", array( "{$nombre}","{$descripcion}", "{$imagen}",$idComedor));
  	}  

  	function crearComedor($nombre,$descripcion,$imagen) {    
    $insertrow = self::$db->insertRow("INSERT INTO prueba.comedor (idcomedor, nombre, descripcion, imagen) VALUES (?, ?, ?, ?)", array(null, "{$nombre}","{$descripcion}","{$imagen}"));
  	}  

   	function mostrarComedor($id) {
    $row = self::$db->getRows("SELECT * FROM comedor where idcomedor= ? ", array("{$id}")); 
    $ObjDemo = new Comedor($row[0]{'idcomedor'},$row[0]{'nombre'},$row[0]{'descripcion'});
    return $ObjDemo;
  	}  

}	

?>
