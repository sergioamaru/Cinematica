<?php
require 'persistencia/IdiomaDAO.php';
require_once 'persistencia/Conexion.php';

class Idioma{
    private $id;
    private $nombre;
    private $idiomaDAO;
    private $conexion;
    
    function getId(){
        return $this -> id;
    }
    
    function getNombre(){
        return $this -> nombre;
    }
    
    function Idioma($id="", $nombre=""){
    $this -> id = $id;
    $this -> nombre = $nombre;
        $this -> conexion = new Conexion();
        $this -> idiomaDAO = new IdiomaDAO($id, $nombre);
    }
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> idiomaDAO -> consultarTodos());
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $resultados[$i] = new Idioma($registro[0], $registro[1]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> idiomaDAO -> consultar());
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