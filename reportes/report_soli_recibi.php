<?php
require('../fpdf/fpdf.php');
date_default_timezone_set('America/El_Salvador');

class PDF extends FPDF
{
    function Header()
    {
        // Header styling
        $this->SetFont('Arial', 'B', 13);
        $this->Image('../recursos/img/tipos_mangos/mangoataulfo.png', 25, 5, 33);
        $this->Text(75, 15, utf8_decode('GESTIÓN MANGO'));
        $this->Text(77, 21, utf8_decode('Av. 25 de Julio, Guasmo sur'));
        $this->Text(88, 27, utf8_decode('Tel: 234-4563-443'));
        $this->Text(78, 33, utf8_decode('mango@gamail.com'));
        $this->Image('../recursos/img/tipos_mangos/mangoataulfo.png', 160, 5, 33);

        // Invoice information
        $this->SetFont('Arial', 'B', 10);
        $this->Text(150, 48, utf8_decode('FACTURA N°:'));
        $this->SetFont('Arial', '', 10);
        $this->Text(176, 48, '001');
        
        $this->SetFont('Arial', 'B', 10);
        $this->Text(10, 48, utf8_decode('Fecha:'));
        $this->SetFont('Arial', '', 10);
        $this->Text(25, 48, date('d/m/Y'));

        // Customer information
        $this->SetFont('Arial', 'B', 10);
        $this->Text(10, 54, utf8_decode('Cliente:'));
        $this->SetFont('Arial', '', 10);
        $this->Text(25, 54, utf8_decode('Gestión Mango S.A.'));

        $this->Ln(50);
    }

    function Footer()
    {
        // Footer styling
        $this->SetFont('Arial', 'B', 8);
        $this->SetY(-15);
        $this->Cell(95, 5, utf8_decode('Página ') . $this->PageNo() . ' / {nb}', 0, 0, 'L');
        $this->Cell(95, 5, date('d/m/Y | g:i:a'), 0, 1, 'R');
        $this->Line(10, 287, 200, 287);
        $this->Cell(0, 5, utf8_decode("Gestión mango © Todos los derechos reservados."), 0, 0, "C");
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetAutoPageBreak(true, 20);
$pdf->SetTopMargin(15);
$pdf->SetLeftMargin(10);
$pdf->SetRightMargin(10);

$pdf->setY(60);
$pdf->setX(135);
$pdf->Ln();

// Table headers
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 7, utf8_decode('Cod'), 1, 0, 'C');
$pdf->Cell(95, 7, utf8_decode('Descripción'), 1, 0, 'C');
$pdf->Cell(20, 7, utf8_decode('Cant'), 1, 0, 'C');
$pdf->Cell(50, 7, utf8_decode('Encargado'), 1, 1, 'C');

// Table data (replace this loop with dynamic data)
for ($i = 0; $i < 5; $i++) {
    $pdf->Cell(20, 7, $i + 1, 1, 0, 'C');
    $pdf->Cell(95, 7, utf8_decode('Descripción del producto'), 1, 0, 'L');
    $pdf->Cell(20, 7, utf8_decode('20'), 1, 0, 'C');
    $pdf->Cell(50, 7, utf8_decode('Ing Steven Rojas'), 1, 1, 'L');
}

// Uncomment the following section for dynamic data like subtotals and totals
/*
$pdf->Ln(10);
$pdf->setX(95);
$pdf->Cell(40, 6, 'Subtotal', 1, 0);
$pdf->Cell(60, 6, '4000', '1', 1, 'R');
$pdf->setX(95);
$pdf->Cell(40, 6, 'Descuento', 1, 0);
$pdf->Cell(60, 6, '4000', '1', 1, 'R');
$pdf->setX(95);
$pdf->Cell(40, 6, 'Impuesto', 1, 0);
$pdf->Cell(60, 6, '4000', '1', 1, 'R');
$pdf->setX(95);
$pdf->Cell(40, 6, 'Total', 1, 0);
$pdf->Cell(60, 6, '4000', '1', 1, 'R');
*/

$pdf->Output();
?>
