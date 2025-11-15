<?php
include("seguridad.php");
if ($_SESSION['rol']==0)
    unset($_SESSION['carrito']);
unset($_SESSION['dni']);
unset($_SESSION['rol']);
unset($_SESSION['pass']);
unset($_SESSION['name']);
header("LOCATION:index.php");
?>