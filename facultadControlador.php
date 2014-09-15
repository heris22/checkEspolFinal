<?php

include_once('databaseControlador.php');
include_once('facultadClase.php');

class FacultadControlador extends DataBaseControlador
{
    
    function mostrarFacultades() {
        $rows = self::$db->getRows("SELECT * FROM facultad");        
        $arrayFacultades= array();

            foreach ($rows as $c){
              $facultadAuxiliar = new Facultad($c{'idfacultad'},$c{'siglas'}, $c{'nombre'}, $c{'imagen'});
            array_push($arrayFacultades, $facultadAuxiliar);
            }
        return $arrayFacultades;        
      }
  
    function mostrarFacultadesJson() {
        $rows = self::$db->getRows("SELECT * FROM facultad");        
        return json_encode($rows);       
    }
      
    function guardarFacultad($siglas, $nombre, $imagen) {
      $rows = self::$db->insertRow("INSERT INTO facultad VALUES(?,?,?,?)", array(null,"{$siglas}","{$nombre}", "{$imagen}"));
    }
    
    function actualizarFacultad($id, $siglas, $nombre, $imagen) {
        $row = self::$db->updateRow("UPDATE facultad SET siglas = ? , nombre = ? , imagen = ? WHERE idfacultad = ? ", array( "{$siglas}", "{$nombre}", "{$imagen}", "{$id}"));
    }
      
    function eliminarFacultad($id) {    
        $row = self::$db->deleteRow("DELETE FROM facultad WHERE idfacultad= ?", array("{$id}"));
  }  
}
?>