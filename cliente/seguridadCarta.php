<?php
include("seguridad.php");
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $_SESSION['mesa']=$_POST['mesa'];
    $_SESSION['comensales']=$_POST['comensales'];
}
if ($_SESSION['mesa'] == "") {
    $_SESSION['sms'] = "Debes seleccionar una mesa";
    header("LOCATION:index.php");
} else {
    if (!isset($_SESSION['comensales']) || $_SESSION['comensales'] < 1) {
        $_SESSION['sms'] = "Debes introducir un número de comensales válido";
        header("LOCATION:index.php");
    }
}
