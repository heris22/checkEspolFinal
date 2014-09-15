<?php

class Profesor
{
    private $idProfesor;
    private $nombres;
    private $apellidos;
    private $tercernivel;
    private $masterado;
    
    
     function __construct($idProfesor,$nombres,$apellidos,$tercernivel,$masterado) {
       $this->idProfesor = $idProfesor;
       $this->nombres = $nombres;
       $this->apellidos = $apellidos;
       $this->tercernivel = $tercernivel;
       $this->masterado = $masterado;
     }
     
     function setIdProfesor($idProfesor){
       $this->idProfesor = $idProfesor;
     } 
     function getIdProfesor(){
       return $this->idProfesor;
     } 
     function setNombreProfesor($nombres){
       $this->nombres = $nombres;
     } 
     function getNombreProfesor(){
       return $this->nombres;
     }
     function setApellidos($apellidos){
       $this->apellidos = $apellidos;
     } 
     function getApellidos(){
       return $this->apellidos;
     }
     function setTercerNivel($tercernivel){
       $this->tercernivel = $tercernivel;
     } 
     function getTercerNivel(){
       return $this->tercernivel;
     } 
     function setMasterado($masterado){
       $this->masterado = $masterado;
     } 
     function getMasterado(){
       return $this->masterado;
     } 
    
}

?> 