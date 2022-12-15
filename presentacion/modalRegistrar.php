<?php
// require 'logica/Persona.php';
// require 'logica/Administrador.php';
if(isset($_POST["registrar"])){
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$correo = $_POST["correo"];
$clave = $_POST["clave"];
$error="";
$usuario = new Usuario("", $nombre, $apellido, $correo, $clave);

if ($usuario->existeCorreo() == true) {
    $error="Usuario ya existe";
}else{
    $usuario->insertar(); 
    $error="Usuario Registrado correctamente";   
}
header("Location: index.php?pid=" . base64_encode("presentacion/inicio.php"));
?><script>
function myFunction() {
  alert($error);
}
</script><?php  
}
?>
<button class="btn btn-info" data-toggle="modal" data-target="#exampleModal2">
  <span class="text-dark">Registrar usuario</span></button>
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Registrar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
   <div class="card-body">
						<form action="index.php?pid=<?php echo base64_encode("presentacion/inicio.php") ?>&nos=true" method="post">
						<div class="form-group">
								<input type="text" name="nombre" class="form-control" placeholder="Nombre" required="required">
							</div>
              <div class="form-group">
								<input type="text" name="apellido" class="form-control" placeholder="Apellido" required="required">
							</div>	
            <div class="form-group">
								<input type="email" name="correo" class="form-control" placeholder="Correo" required="required">
							</div>
							<div class="form-group">
								<input type="password" name="clave" class="form-control" placeholder="Clave" required="required">
							</div>
							<button onclick="myFunction()" type="submit" name="registrar" class="btn btn-info">Registrar</button>
						</form>
					</div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

