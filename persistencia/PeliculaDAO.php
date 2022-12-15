<?php
class PeliculaDAO {
    private $id;
    private $nombre;
    private $sinopsis;
    private $idioma;
    private $imagen;
    private $genero;
    private $director;
    
    function PeliculaDAO ($id="", $nombre="", $sinopsis="", $idioma="", $imagen="", $genero="",$director=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> sinopsis = $sinopsis;
        $this -> idioma = $idioma;
        $this -> imagen = $imagen;
        $this -> genero = $genero;
        $this -> director = $director;
    }
    
    function insertar(){
        return "insert into pelicula
                (nombre, sinopsis, idioma, genero, director)
                values ('" . $this -> nombre . "' , 
                     '" . $this -> sinopsis . "',
                     '" . $this -> idioma . "',
                     '" . $this -> genero . "',
                     '" . $this -> director . "')";
    }
    
    function actualizar(){
        return "update pelicula set
                nombre = '" . $this -> nombre . "',
                sinopsis='" . $this -> sinopsis . "',
                idioma ='" . $this -> idioma . "',
                genero='" . $this -> genero . "',
                director='" . $this -> director . "'
                where idpelicula='" . $this -> id . "'";
    }
    
    function actualizarFoto(){
        return "update pelicula set
                imagen = '" . $this -> imagen . "'
                where idpelicula='" . $this -> id . "'";
    }
    
    function consultar(){
        return "select  nombre, sinopsis, idioma, imagen, genero ,director
                from pelicula
                where idpelicula = '" . $this -> id . "'";
    }
    
    function consultarTodos(){
        return "select idpelicula, nombre, sinopsis, idioma, imagen, genero, director
                from pelicula
                order by nombre";
    }
}


?>