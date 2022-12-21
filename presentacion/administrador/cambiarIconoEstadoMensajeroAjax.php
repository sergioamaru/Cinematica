<?php
$funcion= new Funcion($_GET['idFuncion']);
$funcion-> consultar();
if($funcion -> getEstado() == 1){
    echo "<i id='icono".$funcion->getId()."' class='fas fa-user-times' data-toggle='tooltip' data-placement='left' title='Deshabilitar'></i>";
}else{
    echo "<i id='icono".$funcion->getId()."' class='fas fa-user-check' data-toggle='tooltip' data-placement='left' title='Habilitar'></i>";
}

?>