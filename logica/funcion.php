<?php
require 'persistencia/FuncionDAO.php';
require_once 'persistencia/Conexion.php';

class funcion{

    private $id;
    private $fechaInicio;
    private $fechaFin;
    private $pelicula;
    private $horario;
    private $sillas;
    private $precio;
    private $estado;
    private $funcionDAO;
    private $conexion;
    
    function getId(){
        return $this -> id;
    }
    
    function getFechaInicio(){
        return $this -> fechaInicio;
    }
    
    function getFechaFin(){
        return $this -> fechaFin;
    }
    
    function getPelicula(){
        return $this -> pelicula;
    }
    
    function getHorario(){
        return $this -> horario;
    }
    function getSillas(){
        return $this -> sillas;
    }
    function getPrecio(){
        return $this -> precio;
    }
    function getEstado(){
        return $this -> estado;
    }
        
    function funcion($id="",$fechaInicio="",$fechaFin="",$pelicula="",$horario="",$sillas="", $precio="", $estado=""){
    $this -> id = $id;
    $this -> fechaInicio = $fechaInicio;
    $this -> fechaFin = $fechaFin;
    $this -> pelicula = $pelicula;
    $this -> horario = $horario;
    $this -> sillas = $sillas;
    $this -> precio = $precio;
    $this -> estado = $estado;
    $this -> conexion = new Conexion();
    $this -> funcionDAO = new FuncionDAO($id, $fechaInicio, $fechaFin, $pelicula, $horario, $sillas, $precio, $estado);
    }
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> funcionDAO -> consultarTodos());
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $pelicula= new Pelicula($registro[3]);
            $pelicula->consultar();
            $horario= new Horario($registro[4]);
            $horario->consultar();
            echo $horario->consultar();            
            $resultados[$i] = new funcion($registro[0], $registro[1], $registro[2], $pelicula, $horario, $registro[5], $registro[6], $registro[7]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }

    function consultarPelicula(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> funcionDAO -> consultarPelicula());
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $pelicula= new Pelicula($registro[3]);
            $pelicula->consultar();
            $horario= new Horario($registro[4]);
            $horario->consultar();
            echo $horario->consultar();            
            $resultados[$i] = new funcion($registro[0], $registro[1], $registro[2], $pelicula, $horario, $registro[5], $registro[6], $registro[7]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    function consultarPeliculah(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> funcionDAO -> consultarPeliculah());
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $pelicula= new Pelicula($registro[3]);
            $pelicula->consultar();
            $horario= new Horario($registro[4]);
            $horario->consultar();
            echo $horario->consultar();            
            $resultados[$i] = new funcion($registro[0], $registro[1], $registro[2], $pelicula, $horario, $registro[5], $registro[6], $registro[7]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }

    function consultarDia(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> funcionDAO -> consultarDia());
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $pelicula= new Pelicula($registro[3]);
            $pelicula->consultar();
            $resultados[$i] = new funcion($registro[0], $registro[1], $registro[2], $pelicula, $registro[4], $registro[5],$registro[6], $registro[7]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> funcionDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> fechaInicio = $registro[0];
        $this -> fechaFin = $registro[1];
        $this -> pelicula = $registro[2];
        $this -> horario = $registro[3];
        $this -> sillas = $registro[4];
        $this -> precio = $registro[5];
        $this -> estado = $registro[6];
        $this -> conexion -> cerrar();
    }
    function insertar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> funcionDAO -> insertar());
        $this -> conexion -> cerrar();
    }
    function actualizar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> funcionDAO ->actualizar());
        $this -> conexion -> cerrar();
    }
    function actualizarCantidad(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> funcionDAO ->actualizarCantidad());
        $this -> conexion -> cerrar();
    }
    function cambiarEstado(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> funcionDAO ->cambiarEstado());
        $this -> conexion -> cerrar();
    }
}