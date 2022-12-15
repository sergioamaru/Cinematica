<?php
require_once 'persistencia/Conexion.php';

class FuncionDAO{
    
    private $id;
    private $fechaInicio;
    private $fechaFin;
    private $pelicula;
    private $horario;
    private $sillas;
    private $precio;
    private $conexion;
       
    function FuncionDAO($id="", $fechaInicio="", $fechaFin="", $pelicula="", $horario="",$sillas="",$precio=""){
        $this -> id = $id;
        $this -> fechaInicio = $fechaInicio;
        $this -> fechaFin = $fechaFin;
        $this -> pelicula = $pelicula;
        $this -> horario = $horario;
        $this -> sillas = $sillas;
        $this -> precio = $precio;
    }
    function consultarTodos(){
        return "select *
                from funcion ";
    }

    function consultarPelicula(){
        return "select *
                from funcion
                where pelicula='".$this ->pelicula."'";
    }

    function consultarDia(){
        return "select *
                from funcion
                where fechaInicio<=curdate() and fechaFin>=curdate() ";
    }
    
    function consultar(){
        return "select fechaInicio, fechaFin, pelicula, horario, sillas, precio
                from funcion
                where idfuncion = '" . $this -> id . "'";
    }
    function actualizar(){
        return "update funcion set
             fechaInicio = '" . $this -> fechaInicio . "',
             fechaFin='" . $this -> fechaFin . "',
             Pelicula ='" . $this -> pelicula . "',
             horario='" . $this -> horario . "',
             sillas='" . $this -> sillas . "',
             precio='" . $this -> precio . "'
             where idfuncion='" . $this -> id ."'";
    }
    function insertar(){
        return "insert into funcion
                (fechaInicio, fechaFin, pelicula, horario, sillas, precio)
                values ('" . $this -> fechaInicio . "' ,
                     '" . $this -> fechaFin . "',
                     '" . $this -> pelicula . "',
                     '" . $this -> horario . "',
                     '450',
                     '" . $this -> precio . "')";
    }

    function actualizarCantidad(){
        return "update funcion set
             sillas='" . $this -> sillas . "'
             where idfuncion='" . $this -> id ."'";
    }
}