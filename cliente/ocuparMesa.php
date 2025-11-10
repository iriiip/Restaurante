<?php
if (!isset($_SESSION['mesa']) && !isset($_SESSION['comensales'])) {
    include("../conexion.php");
    $mesa = $_POST['mesa'];
    $consulta = "UPDATE mesa SET estado=1 WHERE num='$mesa'";
    mysqli_query($conn, $consulta);
    $dni = $_SESSION['dni'];
    $consulta = "INSERT INTO pedido VALUES(0,1,'$dni','','$mesa')";
    mysqli_query($conn, $consulta);
}
?>