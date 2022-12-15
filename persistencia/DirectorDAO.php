<?php
class DirectorDAO {
    private $id;
    private $nombre;
    private $apellido;
    
    function DirectorDAO($id="", $nombre="", $apellido=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;        
    }

    function consultar(){
        return "select  nombre, apellido
                from director
                where iddirector = '" . $this -> id . "'";
    }
    
    function consultarTodos(){
        return "select iddirector, nombre, apellido
                from director";
    }
}


?>
