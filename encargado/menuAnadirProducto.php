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
                    <form class="row caja text-center p-3 justify-content-center justify-content-md-around">
                        <div class="col-12 h1">Añadir producto</div>
                        <div class='col-12 mt-2 mb-3'>El precio y el stock de los productos deben ser valores numéricos sin texto a la hora de añadir un producto</div>
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Producto</label>
                            <input type="text" class="form-control" placeholder="Nombre" name="nombre">
                        </div>
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Precio (€)</label>
                            <input type="text" class="form-control" placeholder="Precio" name="precio">
                        </div>
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Stock</label>
                            <input type="text" class="form-control" placeholder="Stock" name="stock">
                        </div>
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Categoría</label>
                            <select name="" id="" class="form-select">
                                <option value="">Elige una categoria</option>
                                <?php
                                include("../conexion.php");
                                $consulta = "SELECT nombre FROM categorias";
                                $result = mysqli_query($conn, $consulta);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $idCateg = $row['id'];
                                    $categoria = $row['nombre'];
                                    echo ("<option value=$idCateg>$categoria</option>");
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-secondary w-100 mt-3 mb-3">Añadir producto</button>
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