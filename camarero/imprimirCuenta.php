<?php
include("seguridad.php");
include("../conexion.php");

require_once '../etiquetadora/vendor/autoload.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\EscposImage;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $mesa = $_GET['mesa'];
        $consulta = "SELECT id FROM pedido WHERE estado=1 AND numMesa='$mesa'";
        $result = mysqli_query($conn, $consulta);
        $row = mysqli_fetch_assoc($result);
        $pedido = $row['id'];

        // Configurar impresora - Usar conexión de red
        $ipImpresora = "192.168.36.170";  // Cambiar a la IP de tu impresora
        $puertoImpresora = 9100;         // Puerto por defecto para impresoras ESC/POS
        $connector = new NetworkPrintConnector($ipImpresora, $puertoImpresora);
        $printer = new Printer($connector);

        // Configuración inicial de la impresora
        $printer->setPrintLeftMargin(0);
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->setTextSize(1, 1);

        // Generar número de factura (año + mes + día + hora + minutos)
        $num_factura = date('YmdHi');

        // Cabecera del ticket
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
        $printer->text("EL RINCÓN DEL MARQUÉS\n");
        $printer->selectPrintMode();
        $printer->text("C/ Buenos Aires, 154 - Molina\n");
        $printer->text("Tel: 912345678\n");
        $printer->text("CIF: B12345678\n");
        $printer->text(str_repeat("-", 32) . "\n");

        // Información de la factura
        $printer->setJustification(Printer::JUSTIFY_LEFT);
        $printer->text("Factura Nº: " . $num_factura . "\n");
        $printer->text("Mesa: $mesa \n");
        $printer->text("Fecha: " . date('d/m/Y H:i') . "\n");
        $printer->text(str_repeat("-", 36) . "\n\n");

        // Cabecera de la tabla
        $printer->text(str_repeat("=", 36) . "\n");
        $printer->text(sprintf("%-20s %3s %10s\n", "PRODUCTO", "UDS", "IMPORTE"));
        $printer->text(str_repeat("=", 36) . "\n");

        // Cambiar la impresora al encoding para las tildes
        $printer->getPrintConnector()->write("\x1B\x74\x02"); // PC850

        // Contenido de la tabla
        $total = 0;
        $consulta = "SELECT p.nombre, pp.cantidad, p.precio FROM producto AS p, pedidoproducto AS pp WHERE pp.idPedido='$pedido' AND p.id=pp.idProducto GROUP BY p.id";
        $result = mysqli_query($conn, $consulta);
        while ($row = mysqli_fetch_assoc($result)) {
            $nombre = $row['nombre'];
            $nombre = iconv("UTF-8", "CP850//TRANSLIT", $nombre); 
            $cantidad = $row['cantidad'];
            $precio = $row['precio'];
            $total += $cantidad * $precio;

            $printer->text(sprintf("%-20s %3s %10s\n", $nombre, $cantidad, $precio));
        }

        // Devolver la impresora al encoding normal
        $printer->getPrintConnector()->write("\x1B\x74\x00"); // PC437

        $iva = 0.21; // 21% IVA

        // Cálculos finales
        $base_imponible = $total * 0.79;
        $cuota_iva = $total - $base_imponible;

        // Cambiar la impresora al encoding para el euro
        $printer->getPrintConnector()->write("\x1B\x74\x13"); // PC858

        // Totales
        $printer->text(str_repeat("-", 36) . "\n");
        $printer->setJustification(Printer::JUSTIFY_RIGHT);
        $printer->text(sprintf("Base Imponible: %10.2f\xD5\n", $base_imponible));
        $printer->text(sprintf("IVA (21%%): %15.2f\xD5\n", $cuota_iva));
        $printer->text(str_repeat("=", 36) . "\n");
        $printer->setEmphasis(true);
        $printer->text(sprintf("TOTAL: %18.2f\xD5\n", $total));
        $printer->setEmphasis(false);

        // Devolver la impresora al encoding normal
        $printer->getPrintConnector()->write("\x1B\x74\x00"); // PC437

        // Pie del ticket
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->text("\n");
        $printer->text("¡Gracias por su visita!\n");
        $printer->text("www.elrincondelmarques.com\n");
        $printer->text("\n");
        $printer->text("Conserve esta factura\n");
        $printer->text("para cualquier reclamación\n");
        $printer->text("\n\n");

        // Cortar ticket
        $printer->cut();
        $printer->close();
    } catch (Exception $e) {
        $_SESSION['sms'] = "Error al imprimir ticket: " . $e->getMessage();
    }
}
header("LOCATION:pedido.php");
