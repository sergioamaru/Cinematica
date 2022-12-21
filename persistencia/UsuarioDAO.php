<?php
class UsuarioDAO {
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    
    function UsuarioDAO ($id, $nombre, $apellido, $correo, $clave){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
    }
    
    function autenticar(){
        return "select idusuario 
                from usuario
                where correo = '" . $this -> correo . "' and clave = md5('" . $this -> clave . "')";
    }

    function consultar(){
        return "select idusuario, nombre, apellido, correo 
                from usuario
                where idusuario = '" . $this -> id . "'";
    }
    function consultarClave(){
        return "select idusuario, nombre, apellido, correo,clave 
                from usuario
                where nombre = '" . $this -> nombre . "' AND
                correo = '" . $this -> correo . "'";
    }

    function insertar(){
        return "insert into usuario
                (nombre,apellido,correo,clave) 
                values ('" . $this -> nombre . "' , 
                     '" . $this -> apellido . "',
                     '" . $this -> correo . "',
                     md5('" . $this->clave . "'))";
    }
    function existeCorreo(){
        return "select idusuario from usuario
                where correo = '" . $this->correo . "'";
    }
    
}


?>