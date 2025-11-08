<?php
include("seguridad.php");
include("../conexion.php");
if ($_POST['categoria'] != "Elige una categoría") {
    $categoria = $_POST['categoria'];
    $consulta = "INSERT INTO producto VALUES(NULL,'Producto','0','0','0','$categoria')";
    mysqli_query($conn, $consulta);
}
header("LOCATION:productos.php");
?>