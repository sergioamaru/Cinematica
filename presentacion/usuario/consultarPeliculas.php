<?php
require_once 'logica/Idioma.php';
require_once 'logica/Director.php';
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$pelicula = new Pelicula();
$peliculas = $pelicula->consultarTodos();
$idioma = new Idioma();
$idioma->consultar();
$director = new Director();
$director->consultar();
include 'presentacion/menuAdministrador.php';
?>
<br></br>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-info text-dark">Consultar Peliculas</div>
				<div class="card-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>						
								<th scope="col">Imagen</th>
								<th scope="col">Nombre</th>
								<th scope="col">Genero</th>
								<th scope="col">Idioma</th>
								<th scope="col">Director</th>
								<th scope="col">Servicios</th>
							</tr>
						</thead>
						<tbody>
						<?php
						
    foreach ($peliculas as $p) {
        echo "<tr>";
        echo "<td>" . (($p->getImagen()!="")?"<img src='/Cinematica/cartelera" . $p->getImagen() . "' height='50px'>":"") . "</td>";
        echo "<td>" . $p->getNombre() . "</td>";
        echo "<td>" . $p->getGenero()->getNombre() . "</td>";
        echo "<td>" . $p->getIdioma()->getNombre(). "</td>";
        echo "<td>" . $p->getDirector()->getNombre(). "</td>";
        echo "<td>" . "<a class='fas fa-user-edit' href='index.php?pid=" . base64_encode("presentacion/administrador/actualizarPelicula.php") . "&idPelicula=" . $p->getId() . "' data-toggle='tooltip' data-placement='left' title='Actualizar datos'> </a>
                       <a class='fas fa-wrench' href='index.php?pid=" . base64_encode("presentacion/administrador/actualizarImagen.php") . "&idPelicula=" . $p->getId() . "' data-toggle='tooltip' data-placement='left' title='Actualizar imagen'> </a>
                       <a href='informacionPelicula.php?idPelicula=" . $p->getId() . "' data-toggle='modal' data-target='#modalPelicula' ><span class='fas fa-info' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Detalles' ></span> </a> 
              </td>";
        echo "</tr>";

    
    }
    echo "<tr><td colspan='7'>..." . count($peliculas) . " registros encontrados...</td></tr>"?>
						</tbody>
					</table>
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

