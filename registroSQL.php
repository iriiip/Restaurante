<?php
include("seguridad.php");
include("conexion.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dni = $_POST['dni'];
    $pass = $_POST['pass'];
    $mail = $_POST['mail'];
    $tlf = $_POST['tlf'];
    $name = $_POST['name'];
    $dir = $_POST['dir'];
    $consulta = "INSERT INTO usuario VALUES('$dni','$pass','$name',0,'$mail','$tlf','$dir',0)";
    mysqli_query($conn, $consulta);
}
$consulta = "SELECT dni,email FROM usuario";
$result = mysqli_query($conn, $consulta);
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['dni'] == $dni) {
        $_SESSION['sms'] = "Ya existe una cuenta con este dni";
    } else if ($row['email'] == $mail) {
        $_SESSION['sms'] = "Ya existe una cuenta con este e-mail";
    }
}
if (!isset($_SESSION['sms']))
    header("LOCATION:index.php");
else
    header("LOCATION:registro.php");
?>
