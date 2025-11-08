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
                    <div class="row caja text-center p-3 justify-content-center justify-content-md-around">
                        <div class="col-12 h1">Productos</div>
                        <form action="anadirProducto.php" method="POST">
                            <div class='col-12 mt-2 mb-4'><button class='btn btn-secondary'>Añadir producto</button></div>
                            <div class="col">
                                <select name="categoria" id="categoria" class="form-select mb-3">
                                    <option selected>Elige una categoría</option>
                                    <?php
                                    include("../conexion.php");
                                    $consulta = "SELECT * FROM categorias";
                                    $result = mysqli_query($conn, $consulta);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $categoria = $row['nombre'];
                                        $id = $row['id'];
                                        echo ("
                                    <option value='$id'>$categoria</option>
                                    ");
                                    }
                                    ?>
                                </select>
                            </div>
                        </form>
                        <div class='col-12 mt-5 mb-3'>El precio y el stock de los productos deben ser valores numéricos sin texto a la hora de modificar un producto</div>
                        <?php
                        include("../conexion.php");
                        $consulta = "SELECT * FROM producto";
                        $result = mysqli_query($conn, $consulta);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $nombre = $row['nombre'];
                            $precio = $row['precio'] . "€";
                            $stock = $row['stock'] . " unidades";
                            $estado = $row['estado'];
                            $categoria = $row['categoria'];

                            if ($estado == 0)
                                $cambiar = "Desactivar";
                            else
                                $cambiar = "Activar";

                            echo ("
                            <div class='col-12 col-md-6 col-xl-4'>
                            <form method='POST' action='modificarProducto.php'>
                            <div class='row'>
                            <div class='col-12'><input type='text' class='form-control' placeholder='Nombre' value='$nombre' name='nombre' id='nombre'></div>
                            <div class='col-12'><input type='text' class='form-control mt-1' placeholder='Precio' value='$precio' name='precio'></div>
                            <div class='col-12'><input type='text' class='form-control mt-1' placeholder='Stock' value='$stock' name='stock'></div>
                            <div class='col-12'>
                            <select class='form-select mt-1' name='categoria'>");
                            $consultaCateg = "SELECT * FROM categorias WHERE id IN(SELECT categoria FROM producto WHERE id='$id')";
                            $resultCateg = mysqli_query($conn, $consultaCateg);
                            $row = mysqli_fetch_assoc($resultCateg);
                            $idCateg = $row['id'];
                            $categoria = $row['nombre'];
                            echo ("<option selected value=$idCateg>$categoria</option>");

                            $consultaCateg = "SELECT * FROM categorias WHERE id NOT IN(SELECT categoria FROM producto WHERE id='$id')";
                            $resultCateg = mysqli_query($conn, $consultaCateg);
                            while ($row = mysqli_fetch_assoc($resultCateg)) {
                                $categoria = $row['nombre'];
                                $idCateg = $row['id'];
                                echo ("
                                    <option value='$idCateg'>$categoria</option>
                                    ");
                            }
                            echo ("</select></div>
                            <input type='hidden' value='$id' name='id'>
                            <div class='col mt-1'><button class='btn btn-secondary w-100' type='submit'>Modificar</button></div>
                            <div class='col mt-1'><a class='btn btn-secondary w-100' href='eliminarProducto.php?id=$id' role='button'>Eliminar</a></div>
                            <div class='col mt-1'><a class='btn btn-secondary w-100 mb-3' href='productoActivado.php?id=$id&estado=$estado' role='button'>$cambiar</a></div>                          
                            </div>
                            </form>
                            </div>                            
                            ");
                        }
                        ?>
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