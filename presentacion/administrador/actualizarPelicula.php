<?php
require_once 'logica/Idioma.php';
require_once 'logica/Director.php';
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$pelicula = new Pelicula($_GET["idPelicula"]);
$pelicula->consultar();
include 'presentacion/menuAdministrador.php';
if (isset($_POST["actualizar"])) {
    $pelicula = new Pelicula($_GET["idPelicula"], $_POST["nombre"], $_POST["sinopsis"], $_POST["idioma"], "", $_POST["genero"], $_POST["director"]);
    $pelicula -> actualizar();

}
?>
<br></br>
<div class="container">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card">
				<div class="card-header bg-info text-white">Actualizar Pelicula</div>
				<div class="card-body">
						<?php
    if (isset($_POST["actualizar"])) {
        ?>
						<div class="alert alert-success" role="alert">Pelicula actualizada
						exitosamente.</div>						
						<?php } ?>
						<form
						action=<?php echo "index.php?pid=" . base64_encode("presentacion/administrador/actualizarPelicula.php")."&idPelicula=".$_GET["idPelicula"] ?>
						method="post">
						<div class="form-group">
							<input type="text" name="nombre" class="form-control"
								placeholder="Nombre" required="required"
								value="<?php echo $pelicula->getNombre(); ?>">
						</div>
						<div class="form-group">
							<input type="text" name="sinopsis" class="form-control"
								placeholder="sinopsis" required="required"
								value="<?php echo $pelicula->getSinopsis(); ?>">
						</div>
						<div class="form-group">
							<label>Genero</label>
							<select class="form-control"
								name="genero">
								<?php
								$genero = new Genero();
								$generos = $genero -> consultarTodos();
								$genero2= new Genero($pelicula->getGenero());
								$genero2->consultar();
								echo "<option value='" . $pelicula->getGenero() . "'>" .$genero2->getNombre() ."</option>";
								foreach ($generos as $g){
									if($pelicula->getGenero()!=$g->getId()){
									echo "<option value='" . $g -> getId() . "'>" . $g -> getNombre() .  "</option>";
									}
								}
								?>
								</select>
								</div>
						<div class="form-group">
							<label>Idioma</label>
							<select class="form-control"
								name="idioma">
								<?php
								$idioma = new Idioma();
								$idiomas = $idioma -> consultarTodos();
								$idioma2= new Idioma($pelicula->getIdioma());
								$idioma2->consultar();
								echo "<option value='" . $pelicula->getIdioma() . "'>" .$idioma2->getNombre() ."</option>";
								foreach ($idiomas as $i){
									if($pelicula->getIdioma()!=$i->getId()){
									echo "<option value='" . $i -> getId() . "'>" . $i -> getNombre() .  "</option>";
									}
								}
								?>
							</select>
						</div>
								<div class="form-group">
							<label>Director</label>
							<select class="form-control"
								name="director">
								<?php
								$director = new Director();
								$directores = $director -> consultarTodos();
								$director2= new Director($pelicula->getDirector());
								$director2->consultar();
								echo "<option value='" . $pelicula->getDirector() . "'>" .$director2->getNombre() ."</option>";
								foreach ($directores as $d){
									if($pelicula->getDirector()!=$d->getId()){
									echo "<option value='" . $d -> getId() . "'>" . $d -> getNombre() .  "</option>";
									}
								}
								?>
							</select>
						</div>
						<button type="submit" name="actualizar" class="btn btn-info">Actualizar</button>
					</form>
				</div>
			</div>
		</div>

	</div>

</div>