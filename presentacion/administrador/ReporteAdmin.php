<?php
//require_once 'logica/Reserva.php';
//require_once 'logica/Usuario.php';
//require_once 'logica/funcion.php';
require 'pdf/class.pdf.php';
require 'pdf/class.ezpdf.php';

$pdf = new Cezpdf('LETTER');
$pdf -> selectFont('pdf/fonts/Helvetica.afm');
$pdf -> ezSetCmMargins(1, 1, 2, 1);
$pdf -> setColor(0,0,0);


$reserva = new Reserva();
$reservas = $reserva -> consultarTodos2();
$pdf -> ezText("LISTA DE RESERVAS\n", 22 , [ 'justification' => 'center']);

foreach ($reservas as $p){
    $reserva2=new Reserva($p->getId());
    $reserva2->consultar();
    $usuario=new Usuario($reserva2->getUsuario());
    $usuario->consultar();
    $funcion=new Funcion($reserva2->getFuncion());
    $funcion->consultar();
    $pelicula=new Pelicula($funcion->getPelicula());
    $pelicula->consultar();
    //$foto= $pdf-> ezImage("/Cinematica/cartelera/" . $pelicula->getImagen(), 0, 10, 1, "center");
    $texto[] =  array('id' => $reserva2->getId()  ,'nom'=> $usuario->getNombre()." ". $usuario->getApellido(), 'cor' => $usuario->getCorreo(), 'pel'=> $pelicula->getnombre(), 'can' => $reserva2->getCantidad(), 'pre' => $reserva2->getTotal(), 'fec' => $reserva2->getFecha()."\n");
    $titles = array('id'=>'Id', 'nom'=>'Nombre', 'cor' => 'Correo', 'pel' => 'Pelicula', 'can' => 'Cantidad', 'pre' => 'Precio', 'fec' => 'Fecha');
}
$pdf -> ezTable($texto, $titles, '', array(  'justification' => 'center', 'width'=>500 ));
$pdf -> ezStream();
?>