<?php
include("seguridad.php");
include("../conexion.php");
$consulta = "INSERT INTO categorias VALUES(NULL,'Categoría')";
mysqli_query($conn,$consulta);
header("LOCATION:categorias.php");
?>