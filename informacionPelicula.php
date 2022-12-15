<?php
require_once 'logica/Pelicula.php';
require_once 'logica/Genero.php';
require_once 'logica/Idioma.php';
require_once 'logica/Director.php';

$idPelicula = $_GET['idPelicula'];
$pelicula = new Pelicula($idPelicula);
$pelicula->consultar();
$genero2 = new Genero($pelicula->getGenero());
$genero2 ->consultar();
$idioma = new Idioma($pelicula->getIdioma());
$idioma ->consultar();
$director = new Director($pelicula->getDirector());
$director->consultar();
?>
<div class="modal-header">
	<h5 class="modal-title">Detalles Pelicula</h5>
	<button type="button" class="close" data-dismiss="modal"
		aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div class="modal-body">
	<table class="table table-striped table-hover">
		<tbody>
			<tr><th width="20%">Nombre</th><td><?php echo $pelicula -> getNombre(); ?></td></tr>
			<?php if($pelicula -> getImagen()!=""){?>
			<tr><th width="20%">Imagen</th><td><img  height="190px" src="/Cinematica/cartelera<?php echo $pelicula -> getImagen(); ?>" /></td></tr>		
			<?php }?>
			<tr><th width="20%">Sinopsis</th><td><?php echo $pelicula -> getSinopsis(); ?></td></tr>
			<tr><th width="20%">Idioma</th><td><?php echo $idioma -> getNombre(); ?></td></tr>
			<tr><th width="20%">Genero</th><td><?php echo $genero2->getNombre(); ?></td></tr>
			<tr><th width="20%">Director</th><td><?php echo $director->getNombre() ?> <?php echo $director->getApellido() ?> </td></tr>		
					
		</tbody>
	</table>
</div>