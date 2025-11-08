<?php
include("seguridad.php");
include("../conexion.php");
if (isset($_POST['nombre']) && $_POST['nombre']!="") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $consulta = "UPDATE categorias SET nombre='$nombre' WHERE id='$id'";
    mysqli_query($conn, $consulta);
}
header("LOCATION:categorias.php");
?>