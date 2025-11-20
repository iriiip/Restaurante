<?php
include ("comprobarOcupado.php");
if (!ocupando() && $_SERVER['REQUEST_METHOD']==='POST') {
    include("../conexion.php");
    $mesa = $_POST['mesa'];
    $consulta = "UPDATE mesa SET estado=1 WHERE num='$mesa'";
    mysqli_query($conn, $consulta);
    $dni = $_SESSION['dni'];
    $fecha = date('d:m:Y');
    $hora = date('H:i:s');
    $comensales = $_POST['comensales'];
    $consulta = "INSERT INTO pedido VALUES(0,1,'$dni','$mesa','$fecha','$hora','$comensales')";
    mysqli_query($conn, $consulta);
}
?>