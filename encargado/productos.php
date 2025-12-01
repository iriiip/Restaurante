<?php

use Dom\Mysql;

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
                            <div class='col-12 mt-2'><a class='btn btn-secondary' role="button" href="menuAnadirProducto.php">Añadir producto</a></div>
                        <div class='col-12 mt-5'>El precio y el stock de los productos deben ser valores numéricos sin texto a la hora de modificar un producto</div>
                        <div class="table-responsive">
                        <table class="table tabla table-dark text-light">
                            <tr>
                                <th>Imagen</th>
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
                            $precio = $row['precio']."€";
                            $stock = $row['stock'];
                            $estado = $row['estado'];
                            $categoria = $row['categoria'];
                            $img = $row['img'];

                            if ($estado == 0)
                                $cambiar = "Desactivar";
                            else
                                $cambiar = "Activar";

                            $consultaCateg = "SELECT nombre FROM categorias WHERE id='$categoria'";
                            $resultCateg = mysqli_query($conn,$consultaCateg);
                            $rowCateg = mysqli_fetch_assoc($resultCateg);
                            $nombreCateg = $rowCateg['nombre'];

                            echo ("
                            <tr>
                            <td><img src='$img' width='50'></td>
                            <td>$nombre</td>
                            <td>$precio</td>
                            <td>$stock unidades</td>
                            <td>$nombreCateg</td>
                            <input type='hidden' value='$id' name='id'>
                            <td><a class='btn btn-secondary w-100' href='menuModificarProducto.php?id=$id&nombre=$nombre&precio=$precio&stock=$stock&categoria=$categoria&nombreCateg=$nombreCateg' role='button'>Modificar</a></td>
                            <td><a class='btn btn-secondary w-100' href='eliminarProducto.php?id=$id' role='button'>Eliminar</a></td>
                            <td><a class='btn btn-secondary w-100 mb-3' href='productoActivado.php?id=$id&estado=$estado' role='button'>$cambiar</a></td> 
                            </tr>                                                 
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