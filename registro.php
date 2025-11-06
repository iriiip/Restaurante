<!-- Head -->
<?php
include("seguridad.php");
include("head.php");
?>

<body>
    <!-- Header -->
    <?php
    include("header.php");
    ?>

    <!-- Section -->
    <?php
    include("conexion.php");
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $dni = $_POST['dni'];
        $pass = $_POST['pass'];
        $consulta = "SELECT rol, nombre FROM usuario WHERE dni='$dni' AND contrasena='$pass'";
        $result = mysqli_query($conn, $consulta);
        $row = mysqli_fetch_array($result);
        if (mysqli_num_rows($result) != 1)
            $sms = "Dni o contraseña incorrecto";
        else {
            $rol = $row['rol'];
            $nombre = $row['nombre'];
            $_SESSION['dni'] = $dni;
            $_SESSION['pass'] = $pass;
            $_SESSION['rol'] = $rol;
            $_SESSION['name'] = $nombre;
            if ($rol == 0) {
                header("LOCATION:cliente/index.php");
            } else if ($rol == 1) {
                header("LOCATION:camarero/index.php");
            } else if ($rol == 2) {
                header("LOCATION:encargado/index.php");
            }
        }
    }
    ?>
    <section>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col col-md-10 col-lg-8 col-xl-7">
                    <form action="" method="POST" class="row caja text-center">
                        <div class="col-auto my-3 mx-auto">
                            <h2>REGISTRO</h2>
                        </div>
                        <div class="col-12 input-group mb-3">
                            <span class="input-group-text bi bi-person-fill"></span>
                            <input class="form-control" type="text" name="dni" id="dni" placeholder="dni" required>
                        </div>
                        <div class="col-12 input-group mb-3">
                            <span class="input-group-text bi bi-lock-fill"></span>
                            <input class="form-control" type="password" name="pass" id="pass" placeholder="contraseña" required>
                        </div>
                        <div class="col-6 mb-3 d-grid mx-auto">
                            <button class="btn btn-secondary" type="submit">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php
    include("footer.php");
    ?>
</body>

</html>