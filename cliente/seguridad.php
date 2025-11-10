<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol']!=0)
    header("LOCATION:../index.php");
include("../conexion.php");
?>