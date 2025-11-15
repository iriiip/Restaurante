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
                <div class="col col-lg-7 col-xl-7 mb-3">
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
                        <div class="col-12">
                            <table class="table tabla table-dark text-light">
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
                                    $id = $row['id'];
                                    echo ("
                                    <form method='POST' action='anadirProducto.php'>
                                    <tr>
                                    <td>$nombre</td>
                                    <input type='hidden' name='producto' value='$id'>
                                    <td>$precio €</td>
                                    <td><button type='submit' class='btn btn-secondary'>Añadir</button></td>
                                    </tr>
                                    </form>
                                    ");
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5 mt-md-0">
                    <form class="row justify-content-center caja text-center p-3" action="pedir.php" method="POST">
                        <div class="col-12">
                            <h2 class="mb-4">Pedido</h2>
                            <?php
                            if (!isset($_SESSION['carrito']))
                                echo ("<h5>Tu pedido aparecerá aquí</h5>");
                            else {
                                echo ("<table class='table tabla table-dark text-light'>
                                <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th></th>
                                </tr>");
                                foreach ($_SESSION['carrito'] as $item) {
                                    $id = $item['id'];
                                    $consulta = "SELECT nombre FROM producto WHERE id='$id'";
                                    $result = mysqli_query($conn, $consulta);
                                    $row = mysqli_fetch_assoc($result);
                                    $nombre = $row['nombre'];
                                    $cantidad = $item['cantidad'];
                                    echo ("
                                    <tr>
                                    <td>$nombre</td>
                                    <td>$cantidad</td>
                                    <td><a class='btn btn-secondary' role='button' href='eliminarProducto.php?id=$id'>Eliminar</a></td>
                                    </tr>
                                    <tr>
                                    <td colspan='3'><input type='text' name='comentario[$id]' placeholder='Comentario' class='form-control'></td>
                                    </tr>
                                    ");
                                }
                                echo ("</table>");
                            }
                            ?>
                            <div class="col-12">
                                <p class="text-danger mb-3">
                                    <?php
                                    if (isset($_SESSION['sms'])) {
                                        echo($_SESSION['sms']);
                                        unset($_SESSION['sms']);
                                    }
                                    ?>
                                </p>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-secondary w-100 mt-3">Pedir</button>
                            </div>
                        </div>
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