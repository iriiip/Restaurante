<nav class="navbar navbar-expand-md navbar-dark bg-dark" id="main_navbar">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php" role="button">Menú</a>
                </li>
                <li class="nav-item">
                    <a href="categorias.php" class="nav-link">Categorías</a>
                </li>
                <li class="nav-item">
                    <a href="productos.php" class="nav-link">Productos</a>
                </li>
                <li class="nav-item">
                    <a href="camareros.php" class="nav-link">Camareros</a>
                </li>
                <li class="nav-item">
                    <a href="encargados.php" class="nav-link">Encargados</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person-fill"> <?php echo $_SESSION['name']; ?></a></i>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../cerrarSesion.php">Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>