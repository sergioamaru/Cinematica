<?php
$funcion = new Funcion($_GET['idFuncion']);
$funcion -> cambiarEstado();
$funcion -> consultar();
echo ($funcion -> getEstado()==0?"Inhabilitado":"Habilitado");
?>