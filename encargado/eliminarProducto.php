<?php
include("seguridad.php");
include("../conexion.php");
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    $consulta = "DELETE FROM producto WHERE id='$id'";
    mysqli_query($conn, $consulta);
}
header("LOCATION:productos.php");
?>