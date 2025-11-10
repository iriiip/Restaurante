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
    include("../navbar.php");
    ?>

    <!-- Section -->
    <section>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col col-md-10 col-lg-8 col-xl-7">
                    <form action="" method="POST" class="row justify-content-center caja text-center">
                        <div class="col-12 mt-3 mb-3">
                            <h2>MESAS</h2>
                        </div>
                        <?php
                        include("../conexion.php");
                        $consulta = "SELECT * FROM mesa";
                        $result = mysqli_query($conn, $consulta);
                        while ($row = mysqli_fetch_assoc($result)) {
                            
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