<?php
require_once("../config/conexion.php"); // se incluye el archivo config.php que contiene la conexión a la base de datos
require('../fpdf/fpdf.php'); // se incluye la librería FPDF que se utilizará para generar el archivo PDF

$pdf = new FPDF('L'); // se crea una instancia de la clase FPDF con orientación horizontal
$pdf->AddPage(); // se agrega una página al archivo PDF

$pdf->SetFont('Arial', 'B', 12); // se establece la fuente para el título de la tabla
$pdf->SetFillColor(200, 200, 200); // se establece el color de fondo para las celdas de la tabla

$query = $conn->query("SELECT cod,fecha,estadoPedido,precioTotal FROM compras"); // se prepara la consulta SQL que se va a ejecutar
// $query->execute(); // se ejecuta la consulta
$results = $query->fetchAll(PDO::FETCH_ASSOC); // se obtienen los resultados de la consulta en forma de un arreglo asociativo

$columnNames = array_keys($results[0]); // se obtienen los nombres de las columnas de la tabla a partir de los resultados

foreach ($columnNames as $columnName) { // se recorre cada columna y se agrega su nombre a la tabla
    $pdf->Cell(35, 12, $columnName, 1, 0, 'C', true);
}
$pdf->Ln(); // se agrega una nueva línea después de agregar los nombres de las columnas

$pdf->SetFont('Arial', '', 10); // se establece la fuente para el contenido de la tabla

foreach ($results as $row) { // se recorre cada fila de la tabla y se agregan sus valores a la tabla
    foreach ($columnNames as $columnName) { // se recorre cada columna de la fila y se agrega su valor a la tabla
        $pdf->Cell(35, 10, $row[$columnName], 1, 0, 'C');
    }
    $pdf->Ln(); // se agrega una nueva línea después de agregar los valores de la fila
}

$pdf->Output(); // se envía el archivo PDF al navegador o se guarda en el servidor
?>

