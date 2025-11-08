<?php
session_start();
if (isset($_SESSION['rol'])) {
    $rol = $_SESSION['rol'];
    if ($rol == 0) {
        header("LOCATION:cliente/index.php");
    } else if ($rol == 1) {
        header("LOCATION:camarero/index.php");
    } else if ($rol == 2) {
        header("LOCATION:encargado/index.php");
    }
}