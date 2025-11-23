<?php
include("seguridad.php");
include("../conexion.php");

require_once '../pdf/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    $consulta = "SELECT fecha, hora, numComensales FROM pedido WHERE id='$id'";
    $result = mysqli_query($conn,$consulta);
    $row = mysqli_fetch_assoc($result);

    $mpdf = new \Mpdf\Mpdf();

    // Datos del restaurante
    $restaurante_nombre = "El Rincón del Marqués";
    $logo_url = "../img/icono.png";

    // Datos de la base de datos
    $fecha = $row['fecha']." ".$row['hora'];
    $num_comensales = $row['numComensales'];
    $precio_total;
    $tabla_productos = "";

    // Aquí generarás con bucles la tabla de productos
    // Ejemplo de estructura:
    $consulta = "SELECT p.nombre, pp.cantidad, p.precio FROM producto AS p, pedidoproducto AS pp WHERE p.id=pp.idProducto AND pp.idPedido='$id'";
    $result = mysqli_query($conn,$consulta);
    while ($row = mysqli_fetch_assoc($result)) {
        $nombre = $row['nombre'];
        $cantidad = $row['cantidad'];
        $precio = $row['precio'];
        $total = number_format($row['precio']*$row['cantidad'],2,".","");
        $tabla_productos .= "
        <tr>
        <td>$nombre</td>
        <td>$cantidad</td>
        <td>$precio €</td>
        <td>$total €</td>
        </tr>
        ";
        $precio_total += $total;
    }

    // Precio final
    $iva = 0.1; // 10% IVA
    $base_imponible = number_format($precio_total / (1 + $iva),2,".","");
    $cuota_iva = number_format($base_imponible * $iva,2,".","");

    // HTML del PDF
    $html = '
<style>
    body { font-family: sans-serif; }
    .header { text-align: center; margin-bottom: 20px; }
    .logo { max-width: 120px; }
    .datos { margin-bottom: 15px; font-size: 12px; }
    table { width: 100%; border-collapse: collapse; margin-top: 10px; }
    th, td { border: 1px solid #000; padding: 8px; font-size: 12px; }
    th { background: #f0f0f0; }
    .total { text-align: right; margin-top: 20px; font-size: 14px; }
</style>

<div class="header">
    <img class="logo" src="' . $logo_url . '" alt="Logo">
    <h2>' . $restaurante_nombre . '</h2>
</div>

<div class="datos">
    <strong>ID Factura:</strong> ' . $id . '<br>
    <strong>Fecha:</strong> ' . $fecha . '<br>
    <strong>Número de comensales:</strong> ' . $num_comensales . '<br>
</div>

<h3>Detalle de productos</h3>

<table>
    <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        ' . $tabla_productos . '
    </tbody>
</table>

<div class="total">
    <p><strong>Base imponible: </strong> '.$base_imponible.' €</p>
    <p><strong>IVA ('.($iva*100).'%): </strong> '.$cuota_iva.' €</p>
    <p><strong>Total: </strong> '.$precio_total.' €</p>
</div>
';

    // Generar PDF
    $mpdf->WriteHTML($html);
    $mpdf->Output("factura.pdf", "I"); // "I" para mostrar en navegador, "D" para descargar
}
header("LOCATION:pedido.php");
