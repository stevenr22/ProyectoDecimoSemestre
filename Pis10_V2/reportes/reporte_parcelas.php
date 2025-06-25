<?php
include("../bd/conexion.php");
require('../fpdf/fpdf.php');
date_default_timezone_set('America/El_Salvador');

class PDF extends FPDF {
  
    public function __construct() {
        parent::__construct('L', 'mm', 'A4');
        $this->SetFont('Arial', '', 10);
    }

    public function Header() {
        $this->Image('../recursos/img/GESTIÓN MANGO.png', 5, 5, 80);
        $this->SetY(15);
        $this->SetX(129);
        $this->SetFont('Arial', 'B', 20);
        $this->SetTextColor(246, 130, 14);
        $this->Cell(50, 8, utf8_decode('Gestión Mango S.A.'), 0, 1);
        $this->SetY(23);
        $this->SetX(140);
        $this->SetFont('Arial', '', 15);
        $this->Cell(40, 8, 'Reporte de parcelas');
        $this->SetTextColor(30, 10, 32);
        $this->Ln(20);
    }

    public function Footer() {
        $this->SetFont('helvetica', 'B', 8);
        $this->SetY(-15);
        $this->Cell(0, 5, utf8_decode("Gestión Mango S.A. © Todos los derechos reservados."), 0, 0, "C");
    }
}

try {
    $sql = "SELECT * FROM parcela WHERE estado = 'Operando' OR estado = 'Denegado'";

    $stmt = $conn->query($sql);

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('P'); // Orientación horizontal
    $pdf->SetAutoPageBreak(true, 20);
    $pdf->SetLeftMargin(10);
    $pdf->SetRightMargin(10);

    $pdf->SetFillColor(57, 210, 57);  // Verde más intenso

    $pdf->SetDrawColor(255, 255, 255);
    $pdf->SetFont('Arial', 'B', 10);

    $headers = ['N°', 'Nombre', 'Ancho en metros', 'Alto en metros', 'Fecha registro', 'Estado'];
    $widths = [20, 30, 40, 40, 30, 40]; // Ajusta estos valores según tus necesidades
    $totalWidth = array_sum($widths);

    // Calcula el espacio en blanco para centrar la tabla
    $blankSpace = ($pdf->GetPageWidth() - $totalWidth) / 2;

    // Establece la posición X inicial para centrar la tabla
    $pdf->SetX($blankSpace);

    // Encabezados
    foreach ($headers as $index => $col) {
        $pdf->Cell($widths[$index], 12, utf8_decode($col), 1, 0, 'C', 1);
    }
    $pdf->Ln();

    $pdf->SetFont('Arial', '', 10);
    while ($row = $stmt->fetch_assoc()) {
        $pdf->SetX($blankSpace);
        $pdf->Cell(20, 8, $row['id_parcela'], 1, 0, 'C');
        $pdf->Cell(30, 8, $row['nombre'], 1, 0, 'C');
        $pdf->Cell(40, 8, $row['ancho'], 1, 0, 'C');
        $pdf->Cell(40, 8, $row['alto'], 1, 0, 'C');
        $pdf->Cell(30, 8, $row['fecha_registro'], 1, 0, 'C');
    
        $pdf->Cell(40, 8, $row['estado'], 1, 1, 'C');
    }

    $pdf->Output('D' , 'Reportes de parcelas.pdf');
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
