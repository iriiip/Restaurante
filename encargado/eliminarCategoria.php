<?php
include("seguridad.php");
include("../conexion.php");
$id = $_GET['id'];
$consulta = "DELETE FROM categorias WHERE id='$id'";
mysqli_query($conn,$consulta);
if (mysqli_error($conn))
    $_SESSION['sms'] = "No se puede eliminar una categoría asignada a un producto";
header("LOCATION:categorias.php");
?>