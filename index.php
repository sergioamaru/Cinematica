<?php 
session_start();
 require 'logica/Persona.php';
 require 'logica/Administrador.php';
 require 'logica/Pelicula.php';
 require 'logica/Genero.php';
 require 'logica/funcion.php';
 require 'logica/Idioma.php';
 require 'logica/Horario.php';
 require 'logica/Director.php';
 require 'logica/Usuario.php';
 require 'logica/Reserva.php';
 

?>
<head>
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script
	src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
})
</script>

</head>


<body background="img/fondo.jpg">
	<?php
if (isset($_GET["pid"])) {
    $pid = base64_decode($_GET["pid"]);
    if(isset($_GET["nos"]) || (!isset($_GET["nos"]))){
        include $pid;
    }else{
        header("Location: index.php");
    }    
} else {
    $_SESSION['id']="";
    include 'presentacion/inicio.php';
}

?>
</body>