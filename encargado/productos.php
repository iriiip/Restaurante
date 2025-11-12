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
                        <div class='col-12 mt-5'>El precio y el stock de los productos deben ser valores numéricos sin texto a la hora de modificar un producto</div>
                        <div class="table-responsive">
                        <table class="table tabla table-dark text-light">
                            <tr>
                                <th>Producto</th>
                                <th>Precio (€)</th>
                                <th>Stock</th>
                                <th>Categoría</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        <?php
                        include("../conexion.php");
                        $consulta = "SELECT * FROM producto";
                        $result = mysqli_query($conn, $consulta);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $nombre = $row['nombre'];
                            $precio = $row['precio'];
                            $stock = $row['stock'];
                            $estado = $row['estado'];
                            $categoria = $row['categoria'];

                            if ($estado == 0)
                                $cambiar = "Desactivar";
                            else
                                $cambiar = "Activar";

                            echo ("
                            <form method='POST' action='modificarProducto.php'>
                            <tr>
                            <td><input type='text' class='form-control' placeholder='Nombre' value='$nombre' name='nombre' id='nombre'></td>
                            <td><input type='text' class='form-control' placeholder='Precio' value='$precio' name='precio'></td>
                            <td><input type='text' class='form-control' placeholder='Stock' value='$stock' name='stock'></td>
                            <td><select class='form-select' name='categoria'>");
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
                            echo ("</select></td>
                            <input type='hidden' value='$id' name='id'>
                            <td><button class='btn btn-secondary w-100' type='submit'>Modificar</button></td>
                            <td><a class='btn btn-secondary w-100' href='eliminarProducto.php?id=$id' role='button'>Eliminar</a></td>
                            <td><a class='btn btn-secondary w-100 mb-3' href='productoActivado.php?id=$id&estado=$estado' role='button'>$cambiar</a></td> 
                            </tr>                         
                            </form>                          
                            ");
                        }
                        ?>
                        </table>
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