<?php
include("seguridad.php");
include("../conexion.php");
$id = $_GET['id'];
$estado = $_GET['estado'];
if ($estado==0)
    $cambio = 1;
else 
    $cambio = 0;
$consulta = "UPDATE producto SET estado='$cambio' WHERE id='$id'";
mysqli_query($conn,$consulta); 
header("LOCATION:productos.php");
?>