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
                    <form action="registrarUsuario.php" method="POST" class="row caja text-center p-3 justify-content-center justify-content-md-around">
                        <div class="col-12 h1">Registrar Usuario</div>
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Dni</label>
                            <input type="text" class="form-control" placeholder="Dni" name="dni" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Nombre</label>
                            <input type="text" class="form-control" placeholder="Nombre" name="nombre" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Teléfono</label>
                            <input type="tel" minlength="9" maxlength="9" class="form-control" placeholder="Tlf" name="tlf" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Dirección</label>
                            <input type="text" class="form-control" placeholder="Dirección ej: C/Martín Cuadros Nº7" name="direccion" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" placeholder="Contraseña" name="contrasena" required>
                        </div>
                        <input type="hidden" name="rol" value="<?php echo($_GET['rol']) ?>">
                        <div class="col-12">
                            <button type="submit" class="btn btn-secondary w-100 mt-3 mb-3">Registrar usuario</button>
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