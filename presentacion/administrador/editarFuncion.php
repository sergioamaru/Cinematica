<?php
require_once 'logica/Horario.php';
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$funcion = new funcion($_GET['idFuncion']);
$funcion ->consultar();
include 'presentacion/menuAdministrador.php';
if (isset($_POST["editar"])) {
    $funcion = new funcion($_GET["idFuncion"], $_POST["fechaInicio"], $_POST["fechaFin"],  $_POST["pelicula"], $_POST["horario"], $_POST["sillas"], $_POST["precio"]);
    $funcion->actualizar();
}
?>
<br></br>
<div class="container">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card">
				<div class="card-header bg-info text-white">Actualizar Funcion</div>
				<div class="card-body">
						<?php
    if (isset($_POST["editar"])) {
        ?>
						<div class="alert alert-success" role="alert">Funcion actualizada
						exitosamente.</div>						
						<?php } ?>
						<form action=<?php echo "index.php?pid=" . base64_encode("presentacion/administrador/editarFuncion.php")."&idFuncion=".$_GET["idFuncion"] ?>
						method="post">
						<div class="form-group">
						<label>Fecha Inicio</label>
							<input type="date" name="fechaInicio" class="form-control"
								placeholder="Fecha Inicio" required="required" 
								value="<?php echo $funcion->getFechaInicio(); ?>">
						</div>
						<div class="form-group">
						<label>Fecha Final</label>
							<input type="date" name="fechaFin" class="form-control"
								placeholder="Fecha Fin" required="required"
								value="<?php echo $funcion->getFechaFin(); ?>">
						</div>
						<div class="form-group">
							<label>Peliculas</label>
							<select class="form-control"
								name="pelicula">
								<?php
								$pelicula = new Pelicula();
								$peliculas = $pelicula -> consultarTodos();
								$pelicula2= new Pelicula($funcion->getPelicula());
								$pelicula2->consultar();
								echo "<option value='" . $funcion->getPelicula() . "'>" .$pelicula2->getNombre() ."</option>";
								foreach ($peliculas as $p){
								    echo "<option value='" . $p -> getId() . "'>" . $p -> getNombre() .  "</option>";
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label>Horario</label>
							<select class="form-control"
								name="horario">
								<?php
								$horario = new Horario();
								$horarios = $horario -> consultarTodos();
								$horario2= new Horario($funcion->getHorario());
								$horario2->consultar();
								echo "<option value='" . $funcion->getHorario() . "'>" .$horario2->getHoraInicio() ."</option>";
								foreach ($horarios as $h){
								    echo "<option value='" . $h -> getId() . "'>" . $h ->getHoraInicio() .  "</option>";
								}
								?>
							</select>
						</div>
						<div class="form-group">
						<label>Cantidad Sillas</label>
							<input type="text" name="sillas" class="form-control"
								placeholder="Cantidad Sillas" required="required"
								value="<?php echo $funcion->getSillas(); ?>">
						</div>
						<div class="form-group">
						<label>Precio</label>
							<input type="text" name="precio" class="form-control"
								placeholder="Precio" required="required"
								value="<?php echo $funcion->getPrecio(); ?>">
						</div>
						<button type="submit" name="editar" class="btn btn-info">Editar</button>
					</form>
				</div>
			</div>
		</div>

	</div>

</div>