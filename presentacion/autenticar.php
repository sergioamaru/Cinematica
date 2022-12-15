<?php
// require 'logica/Persona.php';
// require 'logica/Administrador.php';
$correo = $_POST["correo"];
$clave = $_POST["clave"];


$administrador = new Administrador("", "", "", $correo, $clave);
if($administrador -> autenticar()){
    $_SESSION['id'] = $administrador -> getId();
    header("Location: index.php?pid=" . base64_encode("presentacion/sesionAdministrador.php"));
}else{
    $usuario = new Usuario("", "", "", $correo, $clave);
if($usuario -> autenticar()){
    echo "entro";
    $_SESSION['id'] = $usuario -> getId();
    header("Location: index.php?pid=" . base64_encode("presentacion/sesionUsuario.php"));
}
else{
    header("Location: index.php");
}
}

?>