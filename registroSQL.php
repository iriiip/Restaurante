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
    $pass = $_POST['pass'];

    $consulta = "SELECT dni,email FROM usuario";
    $result = mysqli_query($conn, $consulta);
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['dni'] == $dni) {
            $_SESSION['sms'] = "Ya existe una cuenta con este dni";
        } else if ($row['email'] == $mail) {
            $_SESSION['sms'] = "Ya existe una cuenta con este e-mail";
        } else if (strlen($dni)!=9) {
            $_SESSION['sms'] = "Longitud del dni no válida";
        } else if (strlen($tlf)!=9) {
            $_SESSION['sms'] = "Longitud del teléfono no válida";
        }
    }

    $consulta = "INSERT INTO usuario VALUES('$dni','$name',0,'$mail','$tlf','$dir',0,$pass)";
    mysqli_query($conn, $consulta);
}

if (!isset($_SESSION['sms']))
    header("LOCATION:index.php");
else
    header("LOCATION:registro.php");
