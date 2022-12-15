<?php
require 'persistencia/HorarioDAO.php';
require_once 'persistencia/Conexion.php';

class Horario{
    private $id;
    private $horaInicio;
    private $horaFin;
    private $horarioDAO;
    private $conexion;
    
    function getId(){
        return $this -> id;
    }
    
    function getHoraInicio(){
        return $this -> horaInicio;
    }
    
    function getHoraFin(){
        return $this -> horaFin;
    }
    
    function Horario($id="", $horaInicio="", $horaFin=""){
    $this -> id = $id;
    $this -> horaInicio = $horaInicio;
    $this -> horaInicio = $horaInicio;
        $this -> conexion = new Conexion();
        $this -> horarioDAO = new HorarioDAO($id, $horaInicio, $horaFin);
    }
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> horarioDAO -> consultarTodos());
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $resultados[$i] = new Horario($registro[0], $registro[1], $registro[2]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> horarioDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> id = $registro[0];
        $this -> horaInicio = $registro[1];
        $this -> horaFin = $registro[2];
        $this -> conexion -> cerrar();
    }

}