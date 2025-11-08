<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol']!=1)
    header("LOCATION:../index.php");
?>