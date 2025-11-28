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
    $rol = $_POST['rol'];
    $consulta = "INSERT INTO usuario VALUES('$dni','$nombre','$rol','$email','$tlf','$direccion',0,'$contrasena')";
    mysqli_query($conn, $consulta);
}
if ($rol==1)
    header("LOCATION:camareros.php");
else 
    header("LOCATION:encargados.php");
?>