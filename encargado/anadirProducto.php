<?php
include("seguridad.php");
include("../conexion.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['categoria'] != "") {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $categoria = $_POST['categoria'];
    $consulta = "INSERT INTO producto VALUES(NULL,'$nombre','$precio','$stock',0,'$categoria')";
    mysqli_query($conn, $consulta);
}
header("LOCATION:productos.php");
?>