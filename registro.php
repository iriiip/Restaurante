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
    <section class="d-flex align-items-center">
        <div class="container mt-5">
            <div class="row d-flex align-items-end justify-content-center">
                <div class="col col-md-10 col-lg-8 col-xl-7">
                    <form action="registroSQL.php" method="POST" class="row caja text-center">
                        <div class="col-12 my-3 mx-auto">
                            <h2>REGISTRO</h2>
                        </div>
                        <div class="col-12 input-group mb-3">
                            <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-vcard-fill" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5M9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8m1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5m-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96q.04-.245.04-.5M7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0" />
                                </svg>
                            </span>
                            <input class="form-control" maxlength="9" minlength="9" type="text" name="dni" id="dni" placeholder="Dni" required>

                        </div>
                        <div class="col-12 input-group mb-3">
                            <span class="input-group-text bi bi-lock-fill"></span>
                            <input class="form-control" type="password" name="pass" id="pass" placeholder="Contraseña" required>
                        </div>
                        <div class="col-12 input-group mb-3">
                            <span class="input-group-text bi bi-envelope-fill"></span>
                            <input class="form-control" type="email" name="mail" id="mail" placeholder="E-mail" required>
                        </div>
                        <div class="col-12 input-group mb-3">
                            <span class="input-group-text bi bi-phone-fill"></span>
                            <input class="form-control" maxlength="9" minlength="9" type="tel" name="tlf" id="tlf" placeholder="Teléfono" required>
                        </div>
                        <div class="col-12 input-group mb-3">
                            <span class="input-group-text bi bi-person-fill"></span>
                            <input class="form-control" type="text" name="name" id="name" placeholder="Nombre y apellidos" required>
                        </div>
                        <div class="col-12 input-group mb-3">
                            <span class="input-group-text bi bi-house-fill"></span>
                            <input class="form-control" type="text" name="dir" id="dir" placeholder="Dirección" required>
                        </div>
                        <div class="col-12">
                            <small class="text-danger">
                                <?php
                                if (isset($_SESSION['sms'])) {
                                    echo $_SESSION['sms'];
                                    unset($_SESSION['sms']);
                                } else {
                                    echo ("Todos los campos son obligatorios");
                                }
                                ?>
                            </small>
                        </div>
                        <div class="col-12 mb-3 d-grid mx-auto mt-3">
                            <button class="btn btn-secondary" type="submit">Registrar</button>
                        </div>
                    </form>
                    <div action="" class="row text-center justify-content-center mt-3">
                        <div class="col-12 m-3">
                            ¿Ya tienes cuenta? Inicia sesión.
                        </div>
                        <div class="col-12 mb-5">
                            <a href="index.php" style="text-decoration: none" ; class="btn btn-secondary text-light">Iniciar sesión</a>
                        </div>
                    </div>
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