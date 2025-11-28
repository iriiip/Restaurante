<?php
include("seguridad.php");
include("../conexion.php");
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $dni = $_GET['dni'];
    $consulta = "DELETE FROM usuario WHERE dni='$dni'";
    mysqli_query($conn, $consulta);
}
if ($rol==1)
    header("LOCATION:camareros.php");
else 
    header("LOCATION:encargados.php");
?>