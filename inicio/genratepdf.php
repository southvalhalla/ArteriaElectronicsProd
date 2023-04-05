<?php
require_once("../config/conexion.php");
require('../fpdf/fpdf.php');

$pdf = new FPDF('L');
$pdf->AddPage();

$i = 0;
do{
    
    if($i === 0){
        $query = $conn->query("SELECT * FROM compras");
        $titulo = 'Productos';
    }else  if($i === 1){
        $query = $conn->query("SELECT * FROM categorias");
        $titulo = 'Categorias';
    }else  if($i === 2){
        $query = $conn->query("SELECT documento,nombre,apellido,telefono,correo FROM usuario");    
        $titulo = 'Usuarios';
    }else  if($i === 3){
        $query = $conn->query("SELECT cod,fecha,estadoPedido,metodoPago,precioTotal FROM compras");
        $titulo = 'Compras';
    }

    $results = $query->fetchAll(PDO::FETCH_ASSOC); // se obtienen los resultados de la consulta en forma de un arreglo asociativo
    
    $columnNames = array_keys($results[0]); // se obtienen los nombres de las columnas de la tabla a partir de los resultados
    
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->SetFillColor(200, 200, 200);

    $pdf->Write(12,$titulo);
    $pdf->Ln();

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
    ++$i;
}while($i<4);

$pdf->Output(); // se envía el archivo PDF al navegador o se guarda en el servidor
?>

