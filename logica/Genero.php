<?php
require 'persistencia/GeneroDAO.php';
require_once 'persistencia/Conexion.php';

class Genero{
    private $id;
    private $nombre;
    private $generoDAO;
    private $conexion;
    
    function getId(){
        return $this -> id;
    }
    
    function getNombre(){
        return $this -> nombre;
    }
    
    function Genero($id="", $nombre=""){
    $this -> id = $id;
    $this -> nombre = $nombre;
        $this -> conexion = new Conexion();
        $this -> generoDAO = new GeneroDAO($id, $nombre);
    }
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> generoDAO -> consultarTodos());
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $resultados[$i] = new Genero($registro[0], $registro[1]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> generoDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> id = $registro[0];
        $this -> nombre = $registro[1];
        $this -> conexion -> cerrar();
    }
//      function traerGenero($num){
//          $this -> conexion -> abrir();
//          $this -> conexion -> ejecutar($this -> generoDAO -> NombreGenero($num));
//          $registro = $this -> conexion -> extraer();
//          $this -> id = $registro[0];
//          $this -> nombre = $registro[1];
//          $this -> conexion -> cerrar();
//      }
}