<?php
include("seguridad.php");
include("../conexion.php");
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    unset($_SESSION['carrito'][$id]);
}
header("LOCATION:carta.php");
?>