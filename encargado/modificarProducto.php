<?php
include("seguridad.php");
include("../conexion.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $categoria = $_POST['categoria'];
    $consulta = "UPDATE producto SET nombre='$nombre', precio='$precio', stock='$stock', categoria='$categoria' WHERE id='$id'";
    mysqli_query($conn, $consulta);
}
echo mysqli_error($conn);
header("LOCATION:productos.php");
?>