<?php
include("seguridad.php");
include("../conexion.php");
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    $estado = $_GET['estado'];
    if ($estado==0)
        $consulta = "UPDATE pedidoproducto SET estado=1 WHERE idLinea='$id'";
    else 
        $consulta = "UPDATE pedidoproducto SET estado=0 WHERE idLinea='$id'";
    mysqli_query($conn,$consulta);
}
header("LOCATION:pedido.php");
?>