<?php
include("seguridad.php");
include("../conexion.php");
if (isset($_SESSION['carrito']))
    unset($_SESSION['carrito']);
header("LOCATION:carta.php");
?>