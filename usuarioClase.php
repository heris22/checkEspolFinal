<?php

class Usuario{

	private $idusuario;
	private $nombre;
	private $username;	
	private $email;
	private $contrasenia;
	private $imagen;

	function __construct($idusuario, $nombre,$username,$email,$contrasenia,$imagen) { 
 		$this->idusuario = $idusuario;
 		$this->nombre = $nombre;
 		$this->username = $username;
 		$this->email = $email;
                $this->contrasenia = $contrasenia;
 		$this->imagen = $imagen;
 	} 
        
        function __construct1($nombre,$apellido,$email,$contrasenia,$imagen) { 
 		$this->nombre = $nombre;
 		$this->username = $username;
 		$this->email = $email;
                $this->contrasenia = $contrasenia;
                $this->imagen = $imagen;
 	} 

 	function setIdusuario($idusuario){
		$this->idusuario = $idusuario;
	}
	
	function getIdusuario(){
		return $this->idusuario;
	}

 	function setNombre($nombre){
		$this->nombre = $nombre;
	}

	function getNombre(){
		return $this->nombre;
	}

	function setUsername($apellido){
		$this->username = $username;
	}

	function getUsername(){
		return $this->username;
	}

	function setEmail($email){
		$this->email = $email;
	}

	function getEmail(){
		return $this->email;
	}

	function setContrasenia($contrasenia){
		$this->contrasenia = $contrasenia;
	}

	function getContrasenia(){
		return $this->contrasenia;
	}

	function setImagen($imagen){
		$this->imagen = $imagen;	
	}

	function getImagen(){
		return $this->imagen;	
	}

}


?>
