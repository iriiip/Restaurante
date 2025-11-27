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
                        <div class="col-12 h1">Camareros</div>
                        <div class="col-12 mt-2 mb-3">
                            <a class="btn btn-secondary w-100" role="button" href="menuRegistrarCamarero.php">Registrar camarero</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table tabla table-dark text-light">
                                <?php
                                include("../conexion.php");
                                $consulta = "SELECT * FROM usuario WHERE rol=1";
                                $result = mysqli_query($conn, $consulta);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $nombre = $row['nombre'];
                                    echo ("
                            <form method='POST' action='modificarCategoria.php'>
                            <tr>
                            <td>$nombre</td>
                            <td><button class='btn btn-secondary w-100' type='submit'>Ver datos</button></td>
                            <td><a class='btn btn-secondary w-100' href='eliminarCategoria.php' role='button'>Bloquear</a></td>                          
                            </tr>
                            </form>
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