<?php
function ocupando() {
    include("../conexion.php");
    $dni = $_SESSION['dni'];
    $consulta = "SELECT estado FROM pedido WHERE dni='$dni' && NOT estado=2";
    $result = mysqli_query($conn, $consulta);
    if (mysqli_num_rows($result) != 0)
        return true;
}
?>