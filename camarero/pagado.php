<?php
include("seguridad.php");
include("../conexion.php");
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $mesa = $_GET['mesa'];
    $consulta = "UPDATE pedido SET estado=2 WHERE estado=1 AND numMesa='$mesa'";
    mysqli_query($conn,$consulta);
    $consulta = "UPDATE mesa SET estado=0 WHERE num='$mesa'";
    mysqli_query($conn,$consulta);
}
header("LOCATION:index.php");
?>