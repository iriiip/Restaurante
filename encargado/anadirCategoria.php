<?php
include("seguridad.php");
include("../conexion.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoria = $_POST['categoria'];
    $consulta = "INSERT INTO categorias VALUES(NULL,'$categoria')";
    mysqli_query($conn, $consulta);
}
header("LOCATION:categorias.php");
?>