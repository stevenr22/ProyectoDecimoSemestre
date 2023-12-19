<?php
require('../fpdf/fpdf.php');
date_default_timezone_set('America/El_Salvador');
// Include database connection
include("../bd/conexion.php");
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
// Create PDF instance with horizontal orientation
$pdf = new PDF('L', 'mm', 'A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetAutoPageBreak(true, 20);
$pdf->SetTopMargin(15);
$pdf->SetLeftMargin(10);
$pdf->SetRightMargin(10);

// Set initial position for the table
$pdf->setY(60);
$pdf->setX(10);

// Table headers
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 7, utf8_decode('ID'), 1, 0, 'C');
$pdf->Cell(20, 7, utf8_decode('Solicitud ID'), 1, 0, 'C');
$pdf->Cell(25, 7, utf8_decode('Fecha'), 1, 0, 'C');
$pdf->Cell(25, 7, utf8_decode('Tipo Insumo'), 1, 0, 'C');
$pdf->Cell(30, 7, utf8_decode('Nombre Insumo'), 1, 0, 'C');
$pdf->Cell(20, 7, utf8_decode('Cantidad'), 1, 0, 'C');
$pdf->Cell(30, 7, utf8_decode('Proveedor'), 1, 0, 'C');
$pdf->Cell(30, 7, utf8_decode('Usuario'), 1, 0, 'C');
$pdf->Cell(20, 7, utf8_decode('Cargo'), 1, 0, 'C');
$pdf->Cell(20, 7, utf8_decode('Estado'), 1, 1, 'C');

// Fetch data from the database
$sql = "SELECT 
            sr.id_soli_reci,
            s.id_solicitud,
            s.fecha_solicitud,
            s.tipo_insumo,
            s.nombre_insu,
            s.cantidad,
            s.proveedor,
            u.nombre_completo,
            r.cargo,
            sr.estado
        FROM soli_recibidas sr
        JOIN solicitudes s ON sr.id_solicitudes = s.id_solicitud
        JOIN usuario u ON s.id_usu = u.id_usu
        JOIN rol r ON u.id_rol = r.id_rol";

$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Table data
        $pdf->Cell(20, 7, $row['id_soli_reci'], 1, 0, 'C');
        $pdf->Cell(20, 7, $row['id_solicitud'], 1, 0, 'C');
        $pdf->Cell(25, 7, $row['fecha_solicitud'], 1, 0, 'C');
        $pdf->Cell(25, 7, $row['tipo_insumo'], 1, 0, 'C');
        $pdf->Cell(30, 7, $row['nombre_insu'], 1, 0, 'C');
        $pdf->Cell(20, 7, $row['cantidad'], 1, 0, 'C');
        $pdf->Cell(30, 7, $row['proveedor'], 1, 0, 'C');
        $pdf->Cell(30, 7, $row['nombre_completo'], 1, 0, 'C');
        $pdf->Cell(20, 7, $row['cargo'], 1, 0, 'C');
        $pdf->Cell(20, 7, $row['estado'], 1, 1, 'C');
    }
} else {
    $pdf->Cell(200, 7, utf8_decode('No hay datos para mostrar'), 1, 1, 'C');
}

// Close the database connection
$conn->close();

// Output the PDF
$pdf->Output();
?>
