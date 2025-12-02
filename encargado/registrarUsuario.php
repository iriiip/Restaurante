<?php
include("seguridad.php");
include("../conexion.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $tlf = $_POST['tlf'];
    $direccion = $_POST['direccion'];
    $contrasena = $_POST['contrasena'];
    $rol = $_POST['rol'];
    if (is_numeric($tlf)) {
        $consulta = "SELECT dni,email FROM usuario";
        $result = mysqli_query($conn, $consulta);
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['dni'] == $dni) {
                $_SESSION['sms'] = "Ya existe una cuenta con este dni";
            } else if ($row['email'] == $mail) {
                $_SESSION['sms'] = "Ya existe una cuenta con este e-mail";
            }
        }
        $consulta = "INSERT INTO usuario VALUES('$dni','$nombre','$rol','$email','$tlf','$direccion',0,'$contrasena')";
        mysqli_query($conn, $consulta);
    } else {
        $_SESSION['sms'] = "Número de teléfono no válido";
    }
}
if (isset($_SESSION['sms'])) {
    header("LOCATION:menuRegistrarUsuario.php");
} else {
    if ($rol == 1)
        header("LOCATION:camareros.php");
    else
        header("LOCATION:encargados.php");
}
?>