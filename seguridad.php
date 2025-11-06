<?php
session_start();
if (isset($_SESSION['dni']) && isset($_SESSION['pass']) && isset($_SESSION['rol']) && isset($_SESSION['name'])) {
    $rol = $_SESSION['rol'];
    if ($rol == 0) {
        header("LOCATION:cliente/index.php");
    } else if ($rol == 1) {
        header("LOCATION:camarero/index.php");
    } else if ($rol == 2) {
        header("LOCATION:encargado/index.php");
    }
}
