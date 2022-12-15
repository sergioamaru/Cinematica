<button class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
  <span class="text-dark">Iniciar sesion</span></button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inicio de sesion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
   <div class="card-body">
						<form action="index.php?pid=<?php echo base64_encode("presentacion/autenticar.php") ?>&nos=true" method="post">
							<div class="form-group">
								<input type="email" name="correo" class="form-control" placeholder="Correo" required="required">
							</div>
							<div class="form-group">
								<input type="password" name="clave" class="form-control" placeholder="Clave" required="required">
							</div>
							<button type="submit" class="btn btn-info">Autenticar</button>
						</form>
					</div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>