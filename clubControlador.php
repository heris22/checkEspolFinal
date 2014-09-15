<?php

include_once('clubClase.php');
include_once('databaseControlador.php');


class clubControlador extends DataBaseControlador
{

    function mostrarClub($idclub) {

        $club = self::$db->getRow("SELECT * FROM club WHERE idclub=".$idclub); 
        $clubAuxiliar = new Club($club{'idclub'},$club{'nombreclub'},$club{'informacion'},$club{'mision'},$club{'vision'},$club{'contacto'},$club{'twitter'},$club{'imagen'});  
        return $clubAuxiliar;               
    }
    function mostrarClubJson() {
        $rows = self::$db->getRows("SELECT * FROM club");        
        return json_encode($rows);       
    }

    function mostrarClubes() {

        $rows = self::$db->getRows("SELECT * FROM club");       
        $arrayClubs = array();
    
        foreach ($rows as $c){
          $clubAuxiliar = new Club($c{'idclub'},$c{'nombreclub'},$c{'informacion'},null , null , null , null ,$c{'imagen'});
          array_push($arrayClubs, $clubAuxiliar);
        }
         return $arrayClubs;               
    }
    function guardarClub( $nombre ,  $informacion ,$mision  ,$vision ,$contacto ,$twitter , $imagen ) {
      $rows = self::$db->insertRow("INSERT INTO club  VALUES(? , ? , ? , ? ,? ,? ,? ,? )", array(null,"{$nombre}"  ,"{$informacion}" ,"{$mision}" ,"{$vision}", "{$contacto}" ,"{$twitter}","{$imagen}"));
    }

    function eliminarClub($id) {    
        $row = self::$db->deleteRow("DELETE FROM club WHERE idclub= ?", array("{$id}"));
    }  
    function actualizarClub($id, $nombre ,  $informacion  ,$mision  ,$vision ,$contacto ,$twitter, $imagen ) {
        $row = self::$db->updateRow("UPDATE club SET  nombreclub = ? , informacion = ? , mision = ? , vision = ? , contacto = ?  , twitter = ?, imagen = ? WHERE idclub = ? ", array( "{$nombre}", "{$informacion}", "{$mision}", "{$vision}", "{$contacto}",  "{$twitter}", "{$imagen}", "{$id}"));
    }
   

}

?>