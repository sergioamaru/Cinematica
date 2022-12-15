<?php
$usuario = new Usuario($_SESSION['id']);
$usuario->consultar();
$idusuario=$_SESSION['id'];
include 'presentacion/menuUsuario.php';
$idfuncion= ($_GET["idFuncion"]==true)?$_GET["idFuncion"]:$_POST["idFuncion"];
$funcion=new Funcion($idfuncion);
$funcion->consultar();
if(isset($_POST["reservar"])){
    $cantidad= $_POST["asientos"];
	$nuevaSilla=$funcion->getSillas()-$cantidad;
    $total=$funcion->getPrecio()*$cantidad;
    $reserva = new Reserva("", $idusuario, $idfuncion, $cantidad,$total);
    $reserva -> insertar();
	$funcion2=new Funcion($idfuncion,"","","","",$nuevaSilla);
	$funcion2->actualizarCantidad();
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
						<?php if (isset($_POST['reservar'])) { ?>
					<div class="alert alert-<?php echo ($error == 0) ? "success" : "danger" ?> alert-dismissible fade show" role="alert">
						<?php echo ($error == 0) ? "Reservacion exitosa con valor ".$total."" : "reservacion aplicada "; ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
						<form action=<?php echo "index.php?pid=" . base64_encode("presentacion/usuario/reservar.php")."&nos=true"."&idFuncion=".$idfuncion ?> method="post">
							<div class="form-group">
							<label>Cantidad asientos</label>
								<input type="number" min="1" max="10" name="asientos" class="form-control" required="required">
							</div>
							<center><button type="submit" name="reservar" class="btn btn-info">Reservar Funcion</button></center>
						</form>
					</div>
				</div>
			</div>

		</div>

	</div>