<?php
class HorarioDAO {
    private $id;
    private $horaInicio;
    private $horaFin;
    
    function HorarioDAO ($id="", $horaInicio="", $horaFin=""){
        $this -> id = $id;
        $this -> horaInicio = $horaInicio;
        $this -> horaFin = $horaFin;
    }
    function consultarTodos(){
        return "select *
                from horario";
    }
    function consultar(){
        return "select idhorario, horaInicio, horaFin
                from horario 
                where idhorario = '" . $this -> id . "'";
    }

}


?>