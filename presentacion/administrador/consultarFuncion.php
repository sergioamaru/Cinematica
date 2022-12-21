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
								<th scope="col">Estado</th>
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
		echo "<td><div id='estado".$f->getId()."'>".($f -> getEstado()==0?"Inhabilitado":"Habilitado")."</div></td>";
        echo "<td colspan='2'>" . "<a class='fas fa-user-edit' href='index.php?pid=" . base64_encode("presentacion/administrador/editarFuncion.php") . "&idFuncion=" . $f->getId() . "' data-toggle='tooltip' data-placement='left' title='Editar Funcion'> </a>
			                       <a id='cambiarEstado".$f->getId()."' href='#'><div id='iconoEstado".$f->getId()."'><i id='icono".$f->getId()."' class='fas fa-user-" . ($f->getEstado()==1?"times":"check") . "' data-toggle='tooltip' data-placement='left' title='" . ($f->getEstado()==1?"Deshabilitar":"Habilitar") . "'></i></div></a>
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
<script>
$(document).ready(function(){
<?php 
foreach ($funciones as $f) {
    echo "$(\"#cambiarEstado".$f->getId()."\").click(function(){\n";
    echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/administrador/cambiarEstadoMensajeroAjax.php") ."&idFuncion=".$f->getId()."\";\n";
    echo "$(\"#estado".$f->getId()."\").load(ruta);\n";
    echo "$(\"#icono".$f->getId()."\").tooltip('hide');\n";
    echo "ruta1 = \"indexAjax.php?pid=" . base64_encode("presentacion/administrador/cambiarIconoEstadoMensajeroAjax.php") ."&idFuncion=".$f->getId()."\";\n";
    echo "$(\"#iconoEstado".$f->getId()."\").load(ruta1);\n";
    echo "});\n";
}
?>
});
</script>
