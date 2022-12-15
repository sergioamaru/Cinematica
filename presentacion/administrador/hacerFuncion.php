<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
include 'presentacion/menuAdministrador.php';
if(isset($_POST["ingresar"])){
    $fechainicio= $_POST["fechaInicio"];
    $fechafin= $_POST["fechaFin"];
    $pelicula= $_POST["pelicula"];
    $horario= $_POST["horario"];
	$precio= $_POST["precio"];
    
    $funcion = new funcion("", $fechainicio, $fechafin, $pelicula, $horario, "",$precio);
    $funcion -> insertar();
        $error = 0;
    }
?>
	<br></br>
	<div class="container">
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6">
				<div class="card">
					<div class="card-header bg-info text-white">Insertar Funcion</div>
					<div class="card-body">
						<?php if (isset($_POST['ingresar'])) { ?>
					<div class="alert alert-<?php echo ($error == 0) ? "success" : "danger" ?> alert-dismissible fade show" role="alert">
						<?php echo ($error == 0) ? "Registro de pelicula exitoso" : "la pelicula " . $nombre . " ya existe"; ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
						<form action=<?php echo "index.php?pid=" . base64_encode("presentacion/administrador/hacerFuncion.php")."&nos=true" ?> method="post">
							<div class="form-group">
							<label>Fecha de Inico</label>
								<input type="date" name="fechaInicio" class="form-control" required="required">
							</div>
							<div class="form-group">
							<label>Fecha Final</label>
								<input type="date" name="fechaFin"  class="form-control"  required="required">
							</div>
							<div class="form-group">
							<label>Peliculas</label>
							<select class="form-control"
								name="pelicula">
								<?php
								$pelicula = new Pelicula();
								$peliculas = $pelicula -> consultarTodos();
								foreach ($peliculas as $p){
								    echo "<option value='" . $p -> getId() . "'>" . $p -> getNombre() .  "</option>";
								}
								?>
							</select>
						</div>
							<div class="form-group">
							<label>Horarios</label>
							<select class="form-control"
								name="horario">
								<?php
								$horario =new Horario();
								$horarios = $horario -> consultarTodos();
								foreach ($horarios as $h){
								    echo "<option value='" . $h -> getId() . "'>" . $h -> getHoraInicio() .  "</option>";
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label>Precio</label>
								<input type="text" name="precio"  class="form-control"  required="required">
							</div>
							<button type="submit" name="ingresar" class="btn btn-info">Ingresar Funcion</button>
						</form>
					</div>
				</div>
			</div>

		</div>

	</div>