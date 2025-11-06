<?php
include("../seguridad2.php");
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
                    <form action="" method="POST" class="row caja text-center ">
                        <div class="col-12 m-3">
                            <h2>INICIO DE SESIÓN</h2>
                        </div>
                        <div class="col-12 input-group mb-3">
                            <span class="input-group-text bi bi-person-fill"></span>
                            <input class="form-control" type="text" name="dni" id="dni" placeholder="dni">
                        </div>
                        <div class="col-12 input-group mb-3">
                            <span class="input-group-text bi bi-lock-fill"></span>
                            <input class="form-control" type="text" name="pass" id="pass" placeholder="contraseña">
                        </div>
                        <div class="col-6 mb-3 d-grid mx-auto">
                            <button class="btn btn-secondary" type="submit">Iniciar sesión</button>
                        </div>
                    </form>
                    <div action="" class="row text-center justify-content-center mt-3">
                        <div class="col-12 m-3">
                            ¿No tienes cuenta? Registrate.
                        </div>
                        <div class="col-12 mb-3">
                            <button class="btn btn-secondary" type="button"><a href="#" style="text-decoration: none" ; class="text-light">Registrarse</a></button>
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