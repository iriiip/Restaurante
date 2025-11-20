<?php
include("seguridad.php");
include("comprobarOcupado.php");
if(ocupando())
    header("LOCATION:carta.php");
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
    include("navbarCliente.php");
    ?>

    <!-- Section -->
    <section class="d-flex align-items-center">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col col-md-10 col-lg-8 col-xl-7">
                    <form action="carta.php" method="POST" class="row justify-content-center caja text-center p-3">
                        <div class="col-12 mt-3 mb-3">
                            <h2>MESAS</h2>
                        </div>
                        <div class="col-12 mb-3">
                            <select name="mesa" id="mesa" class="form-select mb-3">
                                <option value="" selected>Elige una mesa</option>
                                <?php
                                include("../conexion.php");
                                $consulta = "SELECT * FROM mesa WHERE estado=0";
                                $result = mysqli_query($conn, $consulta);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $mesa = $row['num'];
                                    echo ("
                            <option value='$mesa'>Mesa $mesa</option>
                            ");
                                }
                                ?>
                            </select>
                            <input type="number" min="1" max="10" name="comensales" id="comensales" class="form-control" placeholder="Número de comensales">
                        </div>
                        <div class="col-12 mb-3">
                            <button type="submit" class="btn btn-secondary w-100">Seleccionar</button>
                        </div>
                        <?php
                        if (isset($_SESSION['sms'])) {
                            $sms = $_SESSION['sms'];
                            echo ("<small class='text-danger'>$sms</small>");
                            unset($_SESSION['sms']);
                        }                            
                        ?>
                    </form>
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