<?php
include("seguridad.php");
include("../conexion.php");

require_once '../etiquetadora/vendor/autoload.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\EscposImage;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $mesa = $_SESSION['mesa'];
        $linea = $_SESSION['linea'];
        unset($_SESSION['mesa']);
        unset($_SESSION['linea']);

        $consulta = "SELECT id FROM pedido WHERE estado=1 AND numMesa='$mesa'";
        $result = mysqli_query($conn, $consulta);
        $row = mysqli_fetch_assoc($result);
        $pedido = $row['id'];

        // Configurar impresora de cocina
        $ipImpresora = "192.168.36.170";
        $puertoImpresora = 9100;
        $connector = new NetworkPrintConnector($ipImpresora, $puertoImpresora);
        $printer = new Printer($connector);

        // Encabezado cocina
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
        $printer->text("COCINA\n");
        $printer->selectPrintMode();
        $printer->text(str_repeat("-", 32) . "\n");

        // Datos del pedido
        $printer->setJustification(Printer::JUSTIFY_LEFT);
        $printer->text("Mesa: $mesa\n");
        $printer->text("Pedido Nº: $pedido\n");
        $printer->text("Fecha: " . date('d/m/Y H:i') . "\n");
        $printer->text(str_repeat("-", 32) . "\n");

        // Encabezado productos
        $printer->text(str_repeat("=", 45) . "\n");
        $printer->text(sprintf("%-20s %3s %20s\n", "PRODUCTO", "UDS", "COMENTARIO"));
        $printer->text(str_repeat("=", 45) . "\n");

        // Encoding para tildes
        $printer->getPrintConnector()->write("\x1B\x74\x02"); // PC850

        // Listado productos
        $consulta = "SELECT p.nombre, pp.cantidad AS cantidad, pp.comentario 
                     FROM producto AS p, pedidoproducto AS pp 
                     WHERE pp.idPedido='$pedido' AND p.id=pp.idProducto AND idLinea>'$linea' 
                     GROUP BY p.id";
        $result = mysqli_query($conn, $consulta);

        while ($row = mysqli_fetch_assoc($result)) {
            $nombre = iconv("UTF-8", "CP850//TRANSLIT", $row['nombre']);
            $cantidad = $row['cantidad'];
            $comentario = iconv("UTF-8", "CP850//TRANSLIT", $row['comentario']);
            if (strlen($comentario)>20)
                $comentario = substr($comentario, 0, 20);
            $printer->text(sprintf("%-20s %3s %20s\n", $nombre, $cantidad, $comentario));
        }

        // Linea final
        $printer->text(str_repeat("=", 45) . "\n\n");

        // Mensaje opcional
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->text(">>> PREPARAR <<<\n\n");

        // Cortar ticket
        $printer->cut();
        $printer->close();
    } catch (Exception $e) {
        $_SESSION['sms'] = "Error al imprimir ticket: " . $e->getMessage();
    }
}
header("LOCATION:carta.php");
?>