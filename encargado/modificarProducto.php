<?php
include("seguridad.php");
include("../conexion.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $categoria = $_POST['categoria'];

    $consulta = "SELECT img FROM producto WHERE id='$id'";
    $result = mysqli_query($conn,$consulta);
    $row = mysqli_fetch_assoc($result);

    if ($_FILES['img']['error'] != UPLOAD_ERR_OK) {
        $ruta = $row['img'];
    } else {
        if (file_exists($row['img']))
            unlink($row['img']);

        $ruta = "../img/".time().".png";
        COPY($_FILES["img"]["tmp_name"],$ruta);
    }

    $consulta = "UPDATE producto SET nombre='$nombre', precio='$precio', stock='$stock', categoria='$categoria', img='$ruta' WHERE id='$id'";
    mysqli_query($conn, $consulta);
}
echo mysqli_error($conn);
header("LOCATION:productos.php");
?>