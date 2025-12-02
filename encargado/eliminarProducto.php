<?php
include("seguridad.php");
include("../conexion.php");
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    $consulta = "DELETE FROM producto WHERE id='$id'";
    mysqli_query($conn, $consulta);
    if (mysqli_error($conn))
        $_SESSION['sms'] = "No se puede eliminar un producto guardado en una factura";
}
header("LOCATION:productos.php");
?>