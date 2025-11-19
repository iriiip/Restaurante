<?php
require_once '../vendor/autoload.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\EscposImage;

try {
    
    // Configurar impresora - Usar conexión de red
    $ipImpresora = "192.168.0.169";  // Cambiar a la IP de tu impresora
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
    $printer->text("RESTAURANTE VEGA MEDIA\n");
    $printer->selectPrintMode();
    $printer->text("C/ Example, 123 - Ciudad\n");
    $printer->text("Tel: 912345678\n");
    $printer->text("CIF: B12345678\n");
    $printer->text(str_repeat("-", 32) . "\n");

    // Información de la factura
    $printer->setJustification(Printer::JUSTIFY_LEFT);
    $printer->text("Factura Nº: " . $num_factura . "\n");
    $printer->text("Mesa: 5 \n");
    $printer->text("Fecha: " . date('d/m/Y H:i') . "\n");
    $printer->text(str_repeat("-", 32) . "\n\n");

    // Cabecera de la tabla
    $printer->text(str_repeat("=", 32) . "\n");
    $printer->text(sprintf("%-16s %3s %10s\n", "PRODUCTO", "UDS", "IMPORTE"));
    $printer->text(str_repeat("=", 32) . "\n");

    // Detalles de productos
    $total = 5000;
    $iva = 0.21; // 21% IVA
    

    // Cálculos finales
    $base_imponible = 107;
    $cuota_iva = $total - $base_imponible;

    // Totales
    $printer->text(str_repeat("-", 32) . "\n");
    $printer->setJustification(Printer::JUSTIFY_RIGHT);
    $printer->text(sprintf("Base Imponible: %10.2f EUR\n", $base_imponible));
    $printer->text(sprintf("IVA (21%%): %15.2f EUR\n", $cuota_iva));
    $printer->text(str_repeat("=", 32) . "\n");
    $printer->setEmphasis(true);
    $printer->text(sprintf("TOTAL: %18.2f EUR\n", $total));
    $printer->setEmphasis(false);

    // Pie del ticket
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->text("\n");
    $printer->text("¡Gracias por su visita!\n");
    $printer->text("www.vegarestaurant.com\n");
    $printer->text("\n");
    $printer->text("Conserve esta factura\n");
    $printer->text("para cualquier reclamación\n");
    $printer->text("\n\n");

    // Cortar ticket
    $printer->cut();
    $printer->close();

    
} catch (Exception $e) {
    echo "Error al imprimir ticket: " . $e->getMessage();
    
}
?>