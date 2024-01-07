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
        $this->SetX(210);
        $this->SetFont('Arial', 'B', 20);
        $this->SetTextColor(246, 130, 14);
        $this->Cell(50, 8, utf8_decode('Gestión Mango S.A.'), 0, 1);
        $this->SetY(23);
        $this->SetX(209);
        $this->SetFont('Arial', '', 15);
        $this->Cell(40, 8, 'Reporte historial de solicitudes');
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
    $sql = "SELECT s.id_solicitud, s.fecha_solicitud, s.tipo_insumo, s.nombre_insu, s.cantidad,
                   u.nombre_completo, r.cargo, s.estado
            FROM usuario AS u
            JOIN rol AS r ON u.id_rol = r.id_rol
            JOIN solicitudes AS s ON s.id_usu = u.id_usu
            WHERE r.cargo = 'Empleado' AND s.estado IN ('Enviado', 'Denegado', 'Aprobado')";

    $stmt = $conn->query($sql);

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L'); // Orientación horizontal
    $pdf->SetAutoPageBreak(true, 20);
    $pdf->SetLeftMargin(10);
    $pdf->SetRightMargin(10);

    $pdf->SetFillColor(57, 210, 57);  // Verde más intenso

    $pdf->SetDrawColor(255, 255, 255);
    $pdf->SetFont('Arial', 'B', 10);

    $headers = ['N°', 'Fecha solicitud', 'Tipo de insumo', 'Item descripción', 'Cantidad', 'Remitente', 'Cargo', 'Estado'];
    $widths = [20, 30, 30, 40, 25, 40, 30, 25]; // Ajusta estos valores según tus necesidades
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
        $pdf->Cell(20, 8, $row['id_solicitud'], 1, 0, 'C');
        $pdf->Cell(30, 8, $row['fecha_solicitud'], 1, 0, 'C');
        $pdf->Cell(30, 8, $row['tipo_insumo'], 1, 0, 'C');
        $pdf->Cell(40, 8, $row['nombre_insu'], 1, 0, 'C');
        $pdf->Cell(25, 8, $row['cantidad'], 1, 0, 'C');
        $pdf->Cell(40, 8, $row['nombre_completo'], 1, 0, 'C');
        $pdf->Cell(30, 8, $row['cargo'], 1, 0, 'C');
        $pdf->Cell(25, 8, $row['estado'], 1, 1, 'C');
    }

    $pdf->Output('I', 'historial de solicitudes.pdf');
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
