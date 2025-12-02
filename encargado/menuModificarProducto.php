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
                <div class="col-12">
                    <form action="modificarProducto.php" enctype="multipart/form-data" method="POST" class="row caja text-center p-3 justify-content-center justify-content-md-around">
                        <div class="col-12 h1">Mofidicar producto</div>
                        <div class='col-12 mt-2 mb-3'>El precio y el stock de los productos deben ser valores numéricos sin texto a la hora de añadir un producto</div>
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Producto</label>
                            <input type="text" class="form-control" placeholder="Nombre" name="nombre" value=<?php echo ($_GET['nombre']); ?> required>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Precio (€)</label>
                            <input type="text" class="form-control" placeholder="Precio" name="precio" value=<?php echo ($_GET['precio']); ?> required>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Stock</label>
                            <input type="text" class="form-control" placeholder="Stock" name="stock" value=<?php echo ($_GET['stock']); ?> required>
                        </div>
                        <!-- id del producto escondida para modificar -->
                        <input type="hidden" name="id" value=<?php echo ($_GET['id']); ?>>
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Categoría</label>
                            <select name="categoria" id="" class="form-select" required>
                                <option value=<?php echo ($_GET['categoria']); ?> selected><?php echo ($_GET['nombreCateg']); ?></option>
                                <?php
                                include("../conexion.php");
                                $categoria = $_GET['categoria'];
                                $consulta = "SELECT * FROM categorias WHERE NOT id='$categoria'";
                                $result = mysqli_query($conn, $consulta);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $idCateg = $row['id'];
                                    $categoria = $row['nombre'];
                                    echo ("<option value=$idCateg>$categoria</option>");
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="img" class="form-label">Imagen (dejar la imagen vacía toma la anterior)</label>
                            <input type="file" class="form-control" name="img" id="img">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-secondary w-100 mt-3 mb-3">Modificar producto</button>
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