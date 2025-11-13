<?php
include("seguridad.php");
include("../conexion.php");
if ($_POST['categoria'] != "") {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $categoria = $_POST['categoria'];
    $consulta = "INSERT INTO producto VALUES(NULL,'Producto','$nombre','$precio','$stock','$categoria')";
    mysqli_query($conn, $consulta);
}
header("LOCATION:productos.php");
?>