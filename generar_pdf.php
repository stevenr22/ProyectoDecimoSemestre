<?php
require('fpdf.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del POST
    $codigo = $_POST['codigo'];
    $categoria = $_POST['categoria'];
    $nombre = $_POST['nombre'];
    $proveedor = $_POST['proveedor'];
    $fechaRegistro = $_POST['fechaRegistro'];

    // Crea un objeto FPDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    
    // Añade los datos al PDF
    $pdf->Cell(40, 10, 'Código: ' . $codigo);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'Categoría: ' . $categoria);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'Nombre: ' . $nombre);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'Proveedor: ' . $proveedor);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'Fecha de Registro: ' . $fechaRegistro);

    // Genera el PDF
    $pdf->Output('D', 'reporte.pdf');
} else {
    // Maneja el caso donde no hay datos POST
    echo 'Error: No se recibieron datos POST.';
}
?>
