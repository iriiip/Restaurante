<?php
include("seguridad.php");
include("../conexion.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $tlf = $_POST['tlf'];
    $direccion = $_POST['direccion'];
    $contrasena = $_POST['contrasena'];
    $consulta = "INSERT INTO usuario VALUES('$dni','$nombre',1,'$email','$tlf','$direccion',0,'$contrasena')";
    mysqli_query($conn, $consulta);
}
header("LOCATION:camareros.php");
?>