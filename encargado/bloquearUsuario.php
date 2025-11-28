<?php
include("seguridad.php");
include("../conexion.php");
if ($_SERVER['REQUEST_METHOD']==='GET') {
    $dni = $_GET['dni'];
    $est = $_GET['est'];
    $rol = $_GET['rol'];
    if ($est==0)
        $consulta = "UPDATE usuario SET estado=1 WHERE dni='$dni'";
    else
        $consulta = "UPDATE usuario SET estado=0 WHERE dni='$dni'";
    mysqli_query($conn,$consulta);
}
if ($rol==1)
    header("LOCATION:camareros.php");
else 
    header("LOCATION:encargados.php");
?>