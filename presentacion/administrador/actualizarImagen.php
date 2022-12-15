<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$pelicula = new Pelicula($_GET["idPelicula"]);
$exito="";
$pelicula->consultar();
if (isset($_POST["actualizar"])) {
    // recibimos los datos de la imagen
    $nombre_foto = $_FILES['foto']['name'];
    $tipo_foto = $_FILES['foto']['type'];
    $tam_foto = $_FILES['foto']['size'];
    if ($tam_foto <= 300000) {
        if (strlen($nombre_foto) <= 45) {
            if ($tipo_foto == "image/png" || $tipo_foto == "image/jpeg" || $tipo_foto == "image/jpg") {
                if ($pelicula->getImagen()) {
                    unlink("C:/xampp/htdocs/Cinematica/cartelera".$pelicula->getImagen());
                }
                // ruta de la carpeta destino en el servidor
                $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/Cinematica/cartelera';
                // movemos la imagen de la carpeta temporal al directorio escogido
                move_uploaded_file($_FILES['foto']['tmp_name'], $carpeta_destino . $nombre_foto);
                
                $pelicula = new Pelicula($_GET["idPelicula"], "", "", "", "$nombre_foto"); // Crear el atributo foto en Paciente
                $pelicula->actualizarFoto();
            } else {
                $exito = "El tipo de la foto solo puede ser png, jpeg y jpg";
            }
        } else {
            $exito = "El nombre de de la
						foto es muy largo.";
        }
    } else {
        $exito = "El tamano de la
						foto es muy grande.";
    }
}
include 'presentacion/menuAdministrador.php';
?>
<br></br>
<div class="container">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card">
				<div class="card-header bg-info text-dark">Actualizar imagen</div>
				<div class="card-img-top">
				<div class="card-body">
				
						<?php
    if (isset($_POST["actualizar"])) {
        ?>
        	<?php if($exito!=""){?>
        	<div class="alert alert-danger" role="alert"><?php echo $exito ?></div>
        	    
        	<?php }else{?>
        	    <div class="alert alert-success" role="alert">foto
						actualizada</div>
        	<?php }?>		
						<?php } ?>
				<?php
				if($pelicula->getImagen()!=""){?>
				    <div>
				    <font  align='center' face='impact' class='card-text'><h3>Imagen Actual</h3></font>
				    <center><img  src="/Cinematica/cartelera<?php echo $pelicula -> getImagen(); ?>" height="200px" /></center>
				
				</div>
				<?php } ?>
				</div>
					<form
						action=<?php echo "index.php?pid=" . base64_encode("presentacion/administrador/actualizarImagen.php")."&idPelicula=".$_GET["idPelicula"] ?>
						method="post" enctype="multipart/form-data">
						<div class="form-group">
							<input type="file" name="foto" size="30" class="form-control"
								placeholder="Foto" required="required">
						</div>
						<center><button type="submit" name="actualizar" class="btn btn-info">Actualizar</button>
					</form>
				</div>
			</div>
		</div>

	</div>

</div>




