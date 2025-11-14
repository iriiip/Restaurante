<?php
include("seguridad.php");
include("../conexion.php");
if (isset($_POST['producto'])) {
    $idProducto = $_POST['producto'];
    if (isset($_SESSION['carrito'][$idProducto])) {
        $_SESSION['carrito'][$idProducto]['cantidad']++;
    } else {
        $_SESSION['carrito'][$idProducto] = [
        'id' => $idProducto,
        'cantidad' => 1
    ];
    }
}
header("LOCATION:carta.php");
?>