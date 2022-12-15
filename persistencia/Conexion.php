<?php
class Conexion {
    private $mysqli;
    private $resultado;
    public function abrir(){
        //$this -> mysqli = new mysqli(servidor, usuario, contrase�a, bd, puerto);
        $this -> mysqli = new mysqli("containers-us-west-180.railway.app", "root", "06APK0UMrnpMywlgW6Xs", "railway");
        $this -> mysqli -> set_charset("utf8");
    }
    public function ultimoId(){
        return $this -> mysqli -> insert_id;
    }
    public function ejecutar($sentencia){
        $this -> resultado = $this -> mysqli -> query($sentencia);
    }
    public function cerrar(){
        $this -> mysqli -> close();
    }
    public function numFilas(){
        if($this -> resultado!=null){
            return $this -> resultado -> num_rows;
        }else{
            return 0;
        }
    }
    public function extraer(){
        return $this -> resultado -> fetch_row();
    }
    public function sentenciaEjecutada(){
        if($this -> resultado === TRUE){
            return true;
        }else{
            return false;
        }
    }
}
?>