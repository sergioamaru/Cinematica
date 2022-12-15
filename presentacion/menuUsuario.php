<nav class="navbar navbar-expand-lg navbar-light bg-info">
	<a class="navbar-brand"
		href="index.php?pid=<?php echo base64_encode("presentacion/sesionUsuario.php")?>"><i
		class="fas fa-home"></i></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse"
		data-target="#navbarSupportedContent"
		aria-controls="navbarSupportedContent" aria-expanded="false"
		aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
				href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
				aria-haspopup="true" aria-expanded="false"> Peliculas </a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/usuario/catalogo.php")?>">Catalogo</a>
				<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/usuario/ReporteUser.php")."&idUsuario=".$usuario->getId()?>">Reporte reservas</a>
				</div>	
			</li>
				<li class="nav-item"><a class="nav-link" href="index.php">Salida</a>
		</ul>
		<span class="navbar-text">
		
      Usuario: <?php echo $usuario -> getNombre() . " " . $usuario -> getApellido() ?> 
    </span>
	</div>
</nav>