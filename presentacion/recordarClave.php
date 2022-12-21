<?php
if(isset($_POST['recuperar'])){
    $nombre = $_POST["nombre"];
    $correo = $_POST['correo'];
    
    $usuario = new Usuario("", $nombre,"", $correo);
    $usuario -> consultarClave();

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
          <h5 class="h5 text-dark  text-center">Recordar clave</h5>
        </div>
      </div>
      <div class="card">
        <div class="card-body ">

          <?php if (isset($_POST['recuperar'])) { ?>
					<div class="alert alert-<?php echo ($usuario->getClave() != '') ? "success" : "danger" ?> alert-dismissible fade show" role="alert">
						<?php echo ($usuario->getClave() != '') ? "La clave es: ".base64_decode($usuario->getClave()) : "no existe"; ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>

			<form method="post" action="index.php?pid=<?php echo base64_encode("presentacion/recordarClave.php") ?>">
            <div class="form-group">
              <input type="email" name="correo" class="form-control" required="required" placeholder="Correo">
            </div>
			<div class="form-group">
              <input type="password" name="clave" class="form-control"  required="required" placeholder="Nueva Clave" >
            </div>
            <div class="text-center">
              <button type="submit" name="recuperar" class="btn btn-info">Recuperar</button>
            </div>
          </form>
        </div>
      </div>
      <br>
    </div>
  </div>
</div>
