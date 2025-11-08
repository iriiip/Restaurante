<?php
include("seguridad.php");
include("../conexion.php");
$id = $_GET['id'];
$consulta = "DELETE FROM producto WHERE id='$id'";
mysqli_query($conn,$consulta);
header("LOCATION:productos.php");
?>