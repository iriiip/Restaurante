<?php
include("seguridad.php");
include("../conexion.php");
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];
$categoria = $_POST['categoria'];
$consulta = "UPDATE producto SET nombre='$nombre', precio='$precio', stock='$stock', categoria='$categoria' WHERE id='$id'";
mysqli_query($conn, $consulta);
header("LOCATION:productos.php");
?>