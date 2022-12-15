<?php
require 'persistencia/DirectorDAO.php';
require_once 'persistencia/Conexion.php';

class Director{
    private $id;
    private $nombre;
    private $apellido;
    private $directorDAO;
    private $conexion;
    
    function getId(){
        return $this -> id;
    }
    
    function getNombre(){
        return $this -> nombre;
    }
    
    function getApellido(){
        return $this -> apellido;
    }
    
    
    function Director($id="", $nombre="", $apellido=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;               
        $this -> conexion = new Conexion();
        $this -> directorDAO = new DirectorDAO($id, $nombre, $apellido);
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> directorDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> apellido = $resultado[1];
        $this -> conexion -> cerrar();
    }

    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> directorDAO -> consultarTodos());
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $resultados[$i] = new Director($registro[0], $registro[1], $registro[2]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    
    
}