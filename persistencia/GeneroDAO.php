<?php
class GeneroDAO {
    private $id;
    private $nombre;
    
    function GeneroDAO ($id="", $nombre=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
    }
    function consultarTodos(){
        return "select *
                from genero";
    }
    function consultar(){
        return "select idgenero, nombre
                from genero 
                where idgenero = '" . $this -> id . "'";
    }

}


?>