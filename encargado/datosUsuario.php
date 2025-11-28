<?php
include("seguridad.php");
?>

<!-- Head -->
<?php
include("../head.php");
?>

<body>
    <!-- Header -->
    <?php
    include("../header.php");
    ?>

    <?php
    include("navbarEncargado.php");
    ?>

    <!-- Section -->
    <section>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col col-md-10 col-lg-8 col-xl-7">
                    <div class="row caja text-center p-3 justify-content-center justify-content-md-around">
                        <h1>Datos</h1>
                        <div class="table-responsive">
                            <table class="table tabla table-dark text-light">
                                <?php
                                include("../conexion.php");
                                $dni = $_GET['dni'];
                                $consulta = "SELECT * FROM usuario WHERE dni='$dni'";
                                $result = mysqli_query($conn, $consulta);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $dni = $row['dni'];
                                    $nombre = $row['nombre'];
                                    $estado = $row['estado'];
                                    if ($estado==0) {
                                        $estado = "Normal";
                                    } else {
                                        $estado = "Bloqueado";
                                    }
                                    $email = $row['email'];
                                    $tlf = $row['telefono'];
                                    $direccion = $row['direccion'];
                                    $pass = $row['contrasena'];
                                    echo ("
                            <tr>
                            <td>Dni</td>
                            <td>$dni</td>        
                            </tr>
                            <tr>
                            <td>Nombre</td>
                            <td>$nombre</td>        
                            </tr>
                            <tr>
                            <td>Estado</td>
                            <td>$estado</td>        
                            </tr>
                            <tr>
                            <td>E-mail</td>
                            <td>$email</td>        
                            </tr>
                            <tr>
                            <td>Teléfono</td>
                            <td>$tlf</td>        
                            </tr>
                            <tr>
                            <td>Direccion</td>
                            <td>$direccion</td>        
                            </tr>
                            <tr>
                            <td>Contraseña</td>
                            <td>$pass</td>        
                            </tr>
                            ");
                                }
                                ?>
                                <div class="col-12">
                                    <?php
                                    if (isset($_SESSION['sms'])) {
                                        $sms = $_SESSION['sms'];
                                        echo ("<small class='text-danger'>$sms</small>");
                                        unset($_SESSION['sms']);
                                    }
                                    ?>
                            </table>
                            <a href="eliminarUsuario.php?dni=<?php echo($dni) ?>" role="button" class="btn btn-secondary w-100">Eliminar usuario</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- Footer -->
    <?php
    include("../footer.php");
    ?>
</body>

</html>