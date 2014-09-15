<?php
include('databaseControlador.php');
include('materiaClase.php');

class MateriaControlador extends DataBaseControlador
{
    
    function mostrarMaterias($idCarrera) {
        $rows = self::$db->getRows("SELECT * FROM materia WHERE idcarrera=".$idCarrera);       
        $arrayMaterias= array();
    
        foreach ($rows as $c){
          $materiaAuxiliar = new Materia($c{'idmateria'},$c{'nombre'},$c{'idfacultad'},$c{'idcarrera'});
          array_push($arrayMaterias, $materiaAuxiliar);
        }
        return $arrayMaterias;        
      }

       function mostrarMateriasJson() {
        $rows = self::$db->getRows("SELECT p.idmateria AS idmateria,p.nombre AS nombremateria,f.siglas AS siglasfacultad, c.nombre AS nombrecarrera,
                                        c.idcarrera, f.idfacultad
                                        FROM materia as p
                                        JOIN facultad as f
                                        ON f.idfacultad=p.idfacultad
                                        JOIN carrera as c
                                        ON c.idcarrera=p.idcarrera;");        
        return json_encode($rows);       
    }
    
    function guardarMateria($nombre, $facultad, $carrera) {
      $rows = self::$db->insertRow("INSERT INTO materia VALUES(?,?,?,?)", array(null,"{$nombre}","{$facultad}","{$carrera}"));
    }
    
    function actualizarMateria($id, $nombre, $facultad, $carrera) {
        $row = self::$db->updateRow("UPDATE materia SET nombre = ?, idfacultad = ?, idcarrera = ? WHERE idmateria = ? ", array( "{$nombre}", "{$facultad}", "{$carrera}", "{$id}"));
    }
      
    function eliminarMateria($id) {    
        $row = self::$db->deleteRow("DELETE FROM materia WHERE idmateria= ?", array("{$id}"));
    }  
}
?>
