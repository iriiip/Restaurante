<?php
include("seguridad.php");
include("../conexion.php");
if (isset($_SESSION['carrito']) && $_SERVER['REQUEST_METHOD']==='POST') {
    $dni = $_SESSION['dni'];

    $consulta = "SELECT id,numMesa FROM pedido WHERE dni='$dni' AND NOT estado=2";
    $result = mysqli_query($conn,$consulta);
    $row = mysqli_fetch_assoc($result);
    $idPedido = $row['id'];
    $mesa = $row['numMesa'];
    $_SESSION['mesa'] = $mesa;

    $consultaLinea = "SELECT MAX(idLinea) AS idLinea FROM pedidoproducto WHERE idPedido='$idPedido'";
    $resultLinea = mysqli_query($conn,$consultaLinea);
    $rowLinea = mysqli_fetch_assoc($resultLinea);
    $linea = $rowLinea['idLinea'];
    $_SESSION['linea'] = $linea;

    foreach ($_SESSION['carrito'] as $item) {
        $idProducto = $item['id'];
        $cant = $item['cantidad'];
        if (isset($_POST['comentario'][$idProducto]))
            $comentario = $_POST['comentario'][$idProducto];
        else 
            $comentario = "";
        $consulta = "SELECT stock FROM producto WHERE id='$idProducto'";
        $result = mysqli_query($conn,$consulta);
        $row = mysqli_fetch_assoc($result);
        $stock = $row['stock'];
        if ($stock>=$cant) {
            $consulta = "INSERT INTO pedidoproducto VALUES(NULL,'$idPedido','$idProducto','$cant',0,'$comentario')";
            mysqli_query($conn,$consulta);
            $consulta = "UPDATE producto SET stock=stock-$cant WHERE id='$idProducto'";
            mysqli_query($conn,$consulta);
        } else {
            $consulta = "SELECT nombre FROM producto WHERE id='$idProducto'";
            $result = mysqli_query($conn,$consulta);
            $row = mysqli_fetch_assoc($result);
            $producto = $row['nombre'];
            $_SESSION['sms'] = "No tenemos suficiente $producto, habla con el camarero";
        }
    }
    unset($_SESSION['carrito']);
}
header("LOCATION:imprimirPedido.php");
?>