<?php
require_once 'persistencia/Conexion.php';

class ReservaDAO{
    
    private $id;
    private $usuario;
    private $funcion;
    private $cantidad;
    private $total;
    private $fecha;
    private $conexion;
       
    function ReservaDAO($id="",$usuario="",$funcion="",$cantidad="",$total="",$fecha=""){
        $this -> id = $id;
        $this -> usuario = $usuario;
        $this -> funcion = $funcion;
        $this -> cantidad = $cantidad;
        $this -> total = $total;
        $this -> fecha = $fecha;
    }
    function consultarTodos(){
        return "select idreserva, idusuario, idfuncion, cantidad, preciototal,fecha
                from reserva ";
    }

    function consultarTodos2(){
        return "select *
                from reserva ";
    }

    function consultarTodos3($idusuario){
        return "select *
                from reserva 
                where idusuario='".$idusuario."'";
    }

    function consultar(){
        return "select *
                from reserva
                where idreserva='".$this -> id."'";
    }
    
    function consultarPelicula(){
        return "select idreserva, idusuario, idfuncion, cantidad, preciototal,fecha
                from reserva
                where idfuncion in (select idfuncion from funcion where pelicula= '" . $this -> pelicula . "')";
    }

    function insertar(){
        return "insert into reserva
                ( idusuario, idfuncion, cantidad,preciototal,fecha)
                values ('" . $this -> usuario . "' , 
                     '" . $this -> funcion . "',
                     '" . $this -> cantidad . "',
                     '". $this -> total. "',
                     CURDATE())";
    }
}