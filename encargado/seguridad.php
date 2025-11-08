<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol']!=2)
    header("LOCATION:../index.php");
?>