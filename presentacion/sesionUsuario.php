<?php
$usuario = new Usuario($_SESSION['id']);
$usuario->consultar();
include 'presentacion/menuUsuario.php';
?>
<br></br>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-info text-dark">Bienvenido Usuario</div>
				<div class="card-body">
					<p>Usuario: <?php echo $usuario -> getNombre() . " " . $usuario -> getApellido() ?></p>
					<p>Correo: <?php echo $usuario -> getCorreo(); ?></p>
					<p>Hoy es: <?php echo date("d-M-Y"); ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
