<?php
include("seguridad.php");
unset($_SESSION['dni']);
unset($_SESSION['rol']);
unset($_SESSION['pass']);
unset($_SESSION['name']);
header("LOCATION:index.php");
?>