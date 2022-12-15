<?php
require 'persistencia/PeliculaDAO.php';
require_once 'persistencia/Conexion.php';

class Pelicula{
    private $id;
    private $nombre;
    private $sinopsis;
    private $idioma;
    private $imagen;
    private $genero;
    private $director;
    private $peliculaDAO;
    private $conexion;
    
    function getId(){
        return $this -> id;
    }
    
    function getNombre(){
        return $this -> nombre;
    }
    
    function getSinopsis(){
        return $this -> sinopsis;
    }
    
    function getIdioma(){
        return $this -> idioma;
    }
    
    function getImagen(){
        return $this -> imagen;
    }
    
    function getGenero(){
        return $this -> genero;
    }
    function getDirector(){
        return $this-> director;
    }
    
    function Pelicula($id="", $nombre="", $sinopsis="", $idioma="", $imagen="", $genero="",$director=""){
    $this -> id = $id;
    $this -> nombre = $nombre;
    $this -> sinopsis = $sinopsis;
    $this -> idioma = $idioma;
    $this -> imagen = $imagen;
    $this -> genero = $genero;
    $this -> director = $director;
        $this -> conexion = new Conexion();
        $this -> peliculaDAO = new PeliculaDAO($id, $nombre, $sinopsis, $idioma, $imagen, $genero,$director); 
    }
    
    function insertar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> peliculaDAO -> insertar());
        $this -> conexion -> cerrar();
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> peliculaDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> sinopsis = $resultado[1];
        $this -> idioma = $resultado[2];
        $this -> imagen = $resultado[3];
        $this -> genero = $resultado[4];
        $this -> director = $resultado[5];
        $this -> conexion -> cerrar();
    }
    //"select  nombre, sionpsis, idioma, imagen, genero 
    function actualizar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> peliculaDAO ->actualizar());
        $this -> conexion -> cerrar();
    }
    
    function actualizarFoto(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> peliculaDAO ->actualizarFoto());
        $this -> conexion -> cerrar();
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> peliculaDAO -> consultarTodos());
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $genero= new Genero($registro[5]);
            $genero->consultar();
              $idioma= new Idioma($registro[3]);
              $idioma->consultar();
              $director= new Director($registro[6]);
              $director->consultar();
              $resultados[$i] = new Pelicula($registro[0], $registro[1], $registro[2], $idioma, $registro[4],$genero,$director);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    
    
}