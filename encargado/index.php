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
                    <div class="row caja text-center">
                        <div class="col mb-3 mt-3">
                            <h1>Categorías</h1>
                            <a href="categorias.php" class="btn btn-secondary">Acceder</a>
                        </div>
                        <div class="col mb-3 mt-3">
                            <h1>Productos</h1>
                            <a href="productos.php" class="btn btn-secondary">Acceder</a>
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