<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$funcion = new funcion();
$funciones = $funcion->consultarTodos();
include 'presentacion/menuAdministrador.php';
?>
<br></br>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-info text-dark">Consultar Funciones</div>
				<div class="card-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>						
								<th scope="col">Id</th>
								<th scope="col">Fecha Inicio</th>
								<th scope="col">Fecha Fin</th>
								<th scope="col">Pelicula</th>
								<th scope="col">Horarios</th>
								<th scope="col">Cantidad Sillas</th>
								<th scope="col">Precio</th>
								<th scope="col">Servicios</th>
								
							</tr>
						</thead>
						<tbody>
						<?php
						foreach ($funciones as $f) {
        echo "<tr>";
        echo "<td>" . $f->getId() . "</td>";
        echo "<td>" . $f->getFechaInicio() . "</td>";
        echo "<td>" . $f->getFechaFin() . "</td>";
        echo "<td>" . $f->getPelicula()->getNombre() . "</td>";
        echo "<td>" . $f->getHorario()->getHoraInicio() . "-".$f->getHorario()->getHoraFin()."</td>";
		echo "<td>" . $f->getSillas() . "</td>";
		echo "<td>" . $f->getPrecio() . "</td>";
        echo "<td>" . "<a class='fas fa-user-edit' href='index.php?pid=" . base64_encode("presentacion/administrador/editarFuncion.php") . "&idFuncion=" . $f->getId() . "' data-toggle='tooltip' data-placement='left' title='Editar Funcion'> </a>
              </td>";
        echo "</tr>";
    
    }
    echo "<tr><td colspan='7'>" . count($funciones) . " registros encontrados</td></tr>"?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
