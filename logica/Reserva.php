<?php
require 'persistencia/ReservaDAO.php';
require_once 'persistencia/Conexion.php';

class Reserva{

    private $id;
    private $usuario;
    private $funcion;
    private $cantidad;
    private $total;
    private $fecha;
    private $ReservaDAO;
    private $conexion;
    
    function getId(){
        return $this -> id;
    }
    
    function getUsuario(){
        return $this -> usuario;
    }
    
    function getFuncion(){
        return $this -> funcion;
    }
    
    function getCantidad(){
        return $this -> cantidad;
    }

    function getTotal(){
        return $this -> total;
    }

    function getFecha(){
        return $this -> fecha;
    }
        
    function Reserva($id="",$usuario="",$funcion="",$cantidad="", $total="",$fecha=""){
    $this -> id = $id;
    $this -> usuario = $usuario;
    $this -> funcion = $funcion;
    $this -> cantidad = $cantidad;
    $this -> total = $total;
    $this -> fecha = $fecha;
    $this -> conexion = new Conexion();
    $this -> reservaDAO = new ReservaDAO($id,$usuario,$funcion,$cantidad, $total,$fecha);
    }
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reservaDAO -> consultarTodos());
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $usuario= new Usuario($registro[1]);
            $usuario->consultar();
            $funcion= new Funcion($registro[2]);
            $funcion->consultar();           
            $resultados[$i] = new funcion($registro[0], $usuario, $funcion,$registro[3], $registro[4],$registro[5]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    function consultarTodos2(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reservaDAO -> consultarTodos2());
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){           
            $resultados[$i] = new funcion($registro[0], $registro[1], $registro[2],$registro[3], $registro[4],$registro[5]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    function consultarTodos3($idusuario){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reservaDAO -> consultarTodos3($idusuario));
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){           
            $resultados[$i] = new funcion($registro[0], $registro[1], $registro[2],$registro[3], $registro[4],$registro[5]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }

    function consultarPelicula(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reservaDAO -> consultarTodos());
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $usuario= new Usuario($registro[1]);
            $pelicula->consultar();
            $funcion= new Funcion($registro[2]);
            $funcion->consultar();
            echo $horario->consultar();            
            $resultados[$i] = new funcion($registro[0], $pelicula, $funcion,$registro[3], $registro[4],$registro[5]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reservaDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> id = $registro[0];
        $this -> usuario = $registro[1];
        $this -> funcion = $registro[2];
        $this -> cantidad = $registro[3];
        $this -> total = $registro[4];
        $this -> fecha = $registro[5];
        $this -> conexion -> cerrar();
    }
    function insertar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reservaDAO -> insertar());
        $this -> conexion -> cerrar();
    }
}