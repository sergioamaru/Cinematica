<?php
require 'persistencia/UsuarioDAO.php';
require_once 'persistencia/Conexion.php';

class Usuario extends Persona {
    private $usuarioDAO;
    private $conexion;
    
    function Usuario($id="", $nombre="", $apellido="", $correo="", $clave=""){ 
        $this -> Persona($id, $nombre, $apellido, $correo, $clave);
        $this -> conexion = new Conexion();
        $this -> usuarioDAO = new UsuarioDAO($id, $nombre, $apellido, $correo, $clave);        
    }
          
    function autenticar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> autenticar());
        if($this -> conexion -> numFilas() == 1){
            $resultado = $this -> conexion -> extraer();
            $this -> id = $resultado[0];
            $this -> conexion -> cerrar();
            return true;
        } else {
            $this -> conexion -> cerrar();
            return false;            
        }
    }   
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> consultar());
        $resultado = $this -> conexion -> extraer();        
        $this -> id = $resultado[0];
        $this -> nombre = $resultado[1];
        $this -> apellido = $resultado[2];
        $this -> correo = $resultado[3];
        $this -> conexion -> cerrar();
    } 
    
    function consultarClave(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> consultarClave());
        $resultado = $this -> conexion -> extraer();        
        $this -> id = $resultado[0];
        $this -> nombre = $resultado[1];
        $this -> apellido = $resultado[2];
        $this -> correo = $resultado[3];
        $this -> clave = $resultado[4];
        $this -> conexion -> cerrar();
    } 
    function insertar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> insertar());
        $this -> conexion -> cerrar();
    }

    function existeCorreo(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> existeCorreo());
        if($this -> conexion -> numFilas() == 0){
            $this -> conexion -> cerrar();
            return false;
        } else {
            $this -> conexion -> cerrar();
            return true;            
        }
    }
}
?>