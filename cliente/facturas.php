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
    include("navbarCliente.php");
    ?>

    <!-- Section -->
    <section class="d-flex align-items-center">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col col-md-10 col-lg-9 col-xl-8">
                    <div class="row justify-content-center caja text-center p-3">
                        <div class="col-12 mt-3 mb-3">
                            <h2>FACTURAS</h2>
                        </div>
                        <div class="col-12 mb-3 table-responsive">
                            <table class="table tabla table-dark text-light">
                                <tr>
                                    <th>Id Factura</th>
                                    <th>Fecha</th>
                                    <th></th>
                                </tr>
                                <?php
                                include("../conexion.php");
                                $dni = $_SESSION['dni'];
                                $consulta = "SELECT id, fecha, hora FROM pedido WHERE dni='$dni' AND estado=2";
                                $result = mysqli_query($conn,$consulta);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id'];
                                    $fecha = $row['fecha'];
                                    $hora = $row['hora'];
                                    echo("
                                    <tr>
                                    <td>$id</td>
                                    <td>$fecha $hora</td>
                                    <td><a role='button' href='generarFactura.php?id=$id' class='btn btn-secondary' target='_blank'>Generar Pdf</a></td>
                                    </tr>
                                    ");
                                }
                                ?>
                            </table>
                        </div>
                        <div class="col-12">
                            <span class="text-danger">
                                <?php
                                if (isset($_SESSION['sms'])) {
                                    echo $_SESSION['sms'];
                                    unset($_SESSION['sms']);
                                }
                                ?>
                            </span>
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