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
                        <div class="col-12 h1">Encargados</div>
                        <div class="col-12 mt-2 mb-3">
                            <a class="btn btn-secondary w-100" role="button" href="menuRegistrarUsuario.php?rol=2">Registrar encargado</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table tabla table-dark text-light">
                                <?php
                                include("../conexion.php");
                                $dni = $_SESSION['dni'];
                                $consulta = "SELECT * FROM usuario WHERE rol=2 AND NOT dni='$dni'";
                                $result = mysqli_query($conn, $consulta);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $dni = $row['dni'];
                                    $nombre = $row['nombre'];
                                    $estado = $row['estado'];
                                    if ($estado)
                                        $bloqueado = "Desbloquear";
                                    else
                                        $bloqueado = "Bloquear";
                                    echo ("
                            <tr>
                            <td>$nombre</td>
                            <td><a class='btn btn-secondary w-100' href='datosUsuario.php?dni=$dni' role='button'>Ver datos</a></td>
                            <td><a class='btn btn-secondary w-100' href='bloquearUsuario.php?dni=$dni&est=$estado&rol=2' role='button'>$bloqueado</a></td>                          
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