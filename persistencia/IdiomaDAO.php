<?php
class IdiomaDAO {
    private $id;
    private $nombre;
    
    function IdiomaDAO($id="", $nombre=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
    }
    function consultarTodos(){
        return "select ididioma, nombre
                from idioma";
    }
    function consultar(){
        return "select ididioma, nombre
                from idioma 
                where ididioma = '" . $this -> id . "'";
    }
}


?>