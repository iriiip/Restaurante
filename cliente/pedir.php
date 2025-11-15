<?php
include("seguridad.php");
include("../conexion.php");
if (isset($_SESSION['carrito']) && $_SERVER['REQUEST_METHOD']==='POST') {
    $dni = $_SESSION['dni'];
    $consulta = "SELECT id FROM pedido WHERE dni='$dni' AND NOT estado=2";
    $result = mysqli_query($conn,$consulta);
    $row = mysqli_fetch_assoc($result);
    $idPedido = $row['id'];
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
header("LOCATION:carta.php");
?>