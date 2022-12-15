<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
include 'presentacion/menuAdministrador.php';
if(isset($_POST['agregar'])){
    $nombre = $_POST["nombre"];
    $sinopsis = $_POST['sinopsis'];
    $idioma = $_POST['idioma'];
    $genero = $_POST['genero'];
    $director = $_POST['director'];
    
    $pelicula = new Pelicula("", $nombre, $sinopsis, $idioma, "", $genero, $director);
    $pelicula -> insertar();
    $error=0;
}

?>
<br></br>
<div class="row">
  <div class="col-s-12">
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body bg-info" >
          <h5 class="h5 text-dark  text-center">Agregar Pelicula</h5>
        </div>
      </div>
      <div class="card">
        <div class="card-body ">

          <?php if (isset($_POST['agregar'])) { ?>
					<div class="alert alert-<?php echo ($error == 0) ? "success" : "danger" ?> alert-dismissible fade show" role="alert">
						<?php echo ($error == 0) ? "Registro de pelicula exitoso" : "la pelicula " . $nombre . " ya existe"; ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>

			<form method="post" action="index.php?pid=<?php echo base64_encode("presentacion/administrador/agregarPeliculas.php") ?>">
			<div class="form-group">
              <input type="text" name="nombre" class="form-control"  required="required" placeholder="Nombre" >
            </div>
            <div class="form-group">
              <input type="text" name="sinopsis" class="form-control" required="required" placeholder="sinopsis">
            </div>
             <div class="form-group">
							<label>Genero</label>
							<select class="form-control"
								name="genero">
								<?php
								$genero = new Genero();
								$generos = $genero -> consultarTodos();
								foreach ($generos as $g){
								    echo "<option value='" . $g -> getId() . "'>" . $g -> getNombre() .  "</option>";
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
								foreach ($idiomas as $i){
								    echo "<option value='" . $i -> getId() . "'>" . $i -> getNombre() .  "</option>";
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
								$directores = $director-> consultarTodos();
								foreach ($directores as $d){
								    echo "<option value='" . $d -> getId() . "'>" . $d -> getNombre() .  "</option>";
								}
								?>
							</select>
						</div>
            <div class="text-center">
              <button type="submit" name="agregar" class="btn btn-info">Agregar</button>
            </div>
          </form>
        </div>
      </div>
      <br>
    </div>
  </div>
</div>
