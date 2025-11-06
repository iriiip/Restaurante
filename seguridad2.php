<?php
session_start();
if (!isset($_SESSION['dni']) || !isset($_SESSION['pass']) || !isset($_SESSION['rol']) || !isset($_SESSION['name']))
    header("LOCATION:index.php");
?>
