<?php

class Facultad
{
    private $idFacultad;
    private $nombreFacultad;
    private $siglas;
    private $imagen;
    
     function __construct($idFacultad,$siglas, $nombreFacultad, $imagen) {
       $this->idFacultad = $idFacultad;
       $this->siglas = $siglas;
       $this->nombreFacultad = $nombreFacultad;
       $this->imagen = $imagen;
     }
    
     function setIdFacultad($idFacultad){
       $this->idFacultad = $idFacultad;
     } 
     function getIdFacultad(){
       return $this->idFacultad;
     } 
      function setNombreFacultad($nombreFacultad){
       $this->nombreFacultad = $nombreFacultad;
     } 
     function getNombreFacultad(){
       return $this->nombreFacultad;
     } 
     
      function setSiglas($nombreFacultad){
       $this->siglas = siglas;
     } 
     function getSiglas(){
       return $this->siglas;
     } 
     
      function setImagen($nombreFacultad){
       $this->imagen = $imagen;
     } 
     function getImagen(){
       return $this->imagen;
     } 
    
}

?> 



