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
                    <div class="row caja text-center mb-5">
                        <div class="col mt-3 mb-3">
                            <form action="" method="POST">
                                <h1>Elige una fecha</h1>
                                <input type="date" name="fecha" id="" class="form-control" required>
                                <button type="submit" class="btn btn-secondary mt-3 w-100">Mostrar estadísticas</button>
                            </form>
                        </div>
                    </div>
                    <?php
                    include("../conexion.php");
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $fecha = date("d:m:Y", strtotime($_POST['fecha']));
                        $consulta = "SELECT SUM(numComensales) as comensales FROM pedido WHERE fecha='$fecha'";
                        $result = mysqli_query($conn, $consulta);
                        $row = mysqli_fetch_assoc($result);
                        $comensales = $row['comensales'];
                        if ($comensales == 0) {
                            echo ("
                            <div class='row text-center'>
                            <div class='col'>
                            <p class='text-danger text-center'>No hay datos para esta fecha</p>
                            </div>
                            </div>
                            ");
                        } else {
                            $consulta = "
                        SELECT SUM(p.precio*pp.cantidad) as total 
                        FROM producto AS p, pedidoproducto AS pp 
                        WHERE p.id=pp.idProducto 
                        AND p.id IN(SELECT idProducto FROM pedidoproducto WHERE idPedido IN(SELECT id FROM pedido WHERE fecha='$fecha')) 
                        AND pp.idPedido IN(SELECT id FROM pedido WHERE fecha='$fecha')
                        ";
                            $result = mysqli_query($conn, $consulta);
                            $row = mysqli_fetch_assoc($result);
                            $total = $row['total'];
                            echo ("
                        <div class='row caja text-center'>
                        <div class='col mt-3 mb-3'>
                        <h1>Comensales</h1>
                        <p class='h1'>$comensales</p>
                        </div>
                        <div class='col mt-3 mb-3'>
                        <h1>Ingresos totales</h1>
                        <p class='h1'>$total €</p>
                        </div>
                        </div>
                        ");
                        }
                    }
                    ?>
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