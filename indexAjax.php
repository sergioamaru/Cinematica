
<?php
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
 require_once 'persistencia/Conexion.php';

 include base64_decode($_GET['pid']);
?>
    <script type="text/javascript">
    $(function () {
    	  $('[data-toggle="tooltip"]').tooltip()
    	})
    </script>