<?php
include("seguridad.php");
include("../conexion.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['categoria'] != "") {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $categoria = $_POST['categoria'];
    $img = time().".png";
    $ruta = "../img/".$img;
    $consulta = "INSERT INTO producto VALUES(NULL,'$nombre','$precio','$stock',0,'$categoria','$ruta')";
    mysqli_query($conn, $consulta);
    COPY($_FILES["img"]["tmp_name"], $ruta);
}
header("LOCATION:productos.php");
?>