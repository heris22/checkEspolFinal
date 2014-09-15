<?php

class Comedor
{
    private $idComedor;
    private $nombre;
    private $descripcion;
    private $imagen;
    
     function __construct($idComedor,$nombre,$descripcion,$imagen) {
       $this->idComedor = $idComedor;
       $this->nombre = $nombre;
       $this->descripcion = $descripcion;
       $this->imagen = $imagen;
     }
    
     function setIdComedor($idComedor){
       $this->idComedor = $idComedor;
     } 
     function getIdComedor(){
       return $this->idComedor;
     } 
     function setNombre($nombre){
       $this->nombre = $nombre;
     } 
     function getNombre(){
       return $this->nombre;
     } 
      function setDescripcion($descripcion){
       $this->descripcion = $descripcion;
     } 
     function getDescripcion(){
       return $this->descripcion;
     } 
     function setImagen($imagen){
       $this->imagen = $imagen;
     } 
     function getImagen(){
       return $this->imagen;
     } 
    
}


?>
