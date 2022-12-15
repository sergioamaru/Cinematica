<?php
require_once 'logica/Pelicula.php';
require_once 'logica/Genero.php';
require_once 'logica/Idioma.php';
require_once 'logica/Director.php';
require_once 'logica/funcion.php';
require_once 'logica/Horario.php';

$idfuncion= $_GET['idFuncion'];
$idPelicula = $_GET['idPelicula'];
$funcion= new funcion($idfuncion);
$funcion->consultar();
$pelicula = new Pelicula($idPelicula);
$pelicula->consultar();
$genero2 = new Genero($pelicula->getGenero());
$genero2 ->consultar();
$idioma = new Idioma($pelicula->getIdioma());
$idioma ->consultar();
$director = new Director($pelicula->getDirector());
$director->consultar();
$horario= new Horario($funcion->getHorario());
$horario->consultar();

include 'presentacion/menuInicio.php';

?>
<br>
<div class="container">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card">
				<div class="card-header bg-info text-white">Detalles Pelicula "<?php echo $pelicula -> getNombre(); ?>"</div>
				<div class="card-body">
	<table class="table table-striped table-hover">
		<tbody>
			<tr><th width="20%">Nombre</th><td><?php echo $pelicula -> getNombre(); ?></td></tr>
			<?php if($pelicula -> getImagen()!=""){?>
			<tr><th width="20%">Imagen</th><td><img  height="190px" src="/Cinematica/cartelera<?php echo $pelicula -> getImagen(); ?>" /></td></tr>		
			<?php }?>
			<tr><th width="20%">Sinopsis</th><td><?php echo $pelicula -> getSinopsis(); ?></td></tr>
			<tr><th width="20%">Idioma</th><td><?php echo $idioma -> getNombre(); ?></td></tr>
			<tr><th width="20%">Genero</th><td><?php echo $genero2->getNombre(); ?></td></tr>
			<tr><th width="20%">Director</th><td><?php echo $director->getNombre(); ?> <?php echo $director->getApellido(); ?></td></tr>
			<tr><th width="20%">Horarios</th><td>Funcion de <?php echo $horario->getHoraInicio(); ?> a <?php echo $horario->getHoraFin(); ?> </td></tr>
			<tr><th width="20%">Fechas</th><td>La Pelicula estara en cartelera hasta <?php echo $funcion->getFechaFin(); ?> </td></tr>		
					
		</tbody>
	</table>
			</div>
		</div>
	</div>
	</div>
</div>