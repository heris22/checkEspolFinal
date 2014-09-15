<?php 

class ComentarioProfesor{

	private $idcomentario;
	private $a;
        
    function __construct($idcomentario,$a) {
       $this->idcomentario = $idcomentario;
       $this->a = $a;      
     }


      function setIdComentario($idComentario){
       $this->idcomentario = $idComentario;
     } 
     function getIdComentario(){
       return $this->idcomentario;
     } 
      function setA($a){
       $this->a = $a;
     } 
     function getA(){
       return $this->a;
     }    
     
}
 ?>