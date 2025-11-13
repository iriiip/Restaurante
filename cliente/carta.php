<?php
include("seguridadCarta.php");
include("ocuparMesa.php");
if (!ocupando())
    header("LOCATION:index.php");
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
                    <div class="row justify-content-center caja text-center p-3">
                        <div class="col-12 mt-3 mb-3">
                            <h2>Carta</h2>
                        </div>
                        <form action="" method='POST'>
                            <div class="col-12 mb-3 input-group">
                                <input type="text" name="producto" id="producto" class="form-control" placeholder="Buscar producto..." value="">
                                <button type="submit" class="btn btn-secondary"><i class="bi bi-search"></i></button>
                            </div>
                        </form>
                        <form action="" method='POST'>
                            <div class="col-12 mb-3">
                                <table class="table table-responsive tabla table-dark text-light">
                                    <tr>
                                        <th>Producto</th>
                                        <th>Precio</th>
                                        <th></th>
                                    </tr>
                                    <?php
                                    include("../conexion.php");
                                    if (isset($_POST['producto'])) {
                                        $producto = $_POST['producto'];
                                        $consulta = "SELECT * FROM producto WHERE NOT stock=0 AND NOT estado=1 AND nombre LIKE '%$producto%'";
                                    } else {
                                        $consulta = "SELECT * FROM producto WHERE NOT stock=0 AND NOT estado=1";
                                    }
                                    $result = mysqli_query($conn, $consulta);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $nombre = $row['nombre'];
                                        $precio = $row['precio'];
                                        echo ("
                                    <tr>
                                    <td>$nombre</td>
                                    <td>$precio €</td>
                                    <td><a role='button' class='btn btn-secondary' href='#'>Añadir</a></td>
                                    </tr>
                                    ");
                                    }
                                    ?>
                                </table>
                            </div>
                            <div class="col-12 mb-3">
                                <button type="button" class="btn btn-secondary w-100">Pedir</button>
                            </div>
                        </form>
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