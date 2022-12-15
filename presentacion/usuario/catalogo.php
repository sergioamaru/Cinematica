<?php
$usuario = new Usuario($_SESSION['id']);
$usuario->consultar();
include 'presentacion/menuUsuario.php';
$funcion = new funcion();
$funciones = $funcion->consultarDia();
?>
<br></br>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div align="center" class="card-header bg-info text-dark">Peliculas en cartelera</div>
				<div class="card-body bg-info">
				<div class="card-group">
   					    <div class="card-deck">
					<?php 
					foreach($funciones   as $f){?>
  <div class="card">
    <?php echo "" . (($f->getPelicula()->getImagen()!="")?"<img height='200px'  src='/Cinematica/cartelera" .$f->getPelicula()->getImagen() . "' >":"") . "";?>
    <div class="card-body">
    <a href=<?php echo "index.php?pid=" . base64_encode("presentacion/usuario/informacion.php") . "&idPelicula=". $f->getPelicula()->getId() . "&idFuncion=". $f->getId() ?>><center><font face="impact" class="card-title text-dark"><h5><?php echo $f->getPelicula()->getNombre()?></h5></font></center></a>
    </div>
  </div>
   					<?php }?>
   					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalPelicula" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" >
		<div class="modal-content" id="modalContent">
		</div>
	</div>
</div>
<script>
	$('body').on('show.bs.modal', '.modal', function (e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-content").load(link.attr("href"));
	});
</script>