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
    include("navbarCamarero.php");
    ?>

    <!-- Section -->
    <section class="d-flex align-items-center">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col col-md-10 col-lg-9 col-xl-8">
                    <div class="row justify-content-center caja text-center p-3">
                        <div class="col-12 mt-3 mb-3">
                            <h2>PEDIDO</h2>
                        </div>
                        <div class="col-12 mb-3 table-responsive">
                            <table class="table tabla table-dark text-light">
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Notas</th>
                                    <th>Estado</th>
                                </tr>
                                <?php
                                include("../conexion.php");
                                if (isset($_POST['mesa'])) {
                                    $_SESSION['mesa'] = $_POST['mesa'];
                                }
                                $mesa = $_SESSION['mesa'];
                                $consulta = "SELECT idProducto, cantidad, estado, idLinea, comentario FROM pedidoproducto WHERE idPedido IN(SELECT id FROM pedido WHERE NOT estado=2 AND numMesa='$mesa')";
                                $result = mysqli_query($conn, $consulta);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $cantidad = $row['cantidad'];
                                    $id = $row['idProducto'];
                                    $idLinea = $row['idLinea'];
                                    $estado = $row['estado'];
                                    $comentario = $row['comentario'];
                                    if ($estado == 0)
                                        $cambiar = "En curso";
                                    else
                                        $cambiar = "Entregado";
                                    $consulta2 = "SELECT nombre FROM producto WHERE id='$id'";
                                    $result2 = mysqli_query($conn, $consulta2);
                                    $row2 = mysqli_fetch_assoc($result2);
                                    $producto = $row2['nombre'];
                                    echo ("
                                    <tr>
                                    <td>$producto</td>
                                    <td>$cantidad unidades</td>
                                    
                                    ");
                                    if ($comentario!="")
                                        echo ("<td>$comentario</td>");
                                    else 
                                        echo("<td></td>");
                                    echo("
                                    <td><a role='button' href='entregado.php?id=$idLinea&estado=$estado' class='btn btn-secondary'>$cambiar</a></td>
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
                         <div class="col">
                            <a role="button" class="btn btn-secondary w-100" href="imprimirCuenta.php?mesa=<?php echo($mesa); ?>">Imprimir cuenta</a>
                        </div>
                        <div class="col">
                            <a role="button" class="btn btn-secondary w-100" href="pagado.php?mesa=<?php echo($mesa); ?>">Pagado</a>
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