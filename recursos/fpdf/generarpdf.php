<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

try {
    if (isset($_POST['generarpdf'])) {
        require('../recursos/fpdf/fpdf.php');

        // Crear instancia de FPDF
        $pdf = new FPDF();
        $pdf->AddPage();

        // Añadir contenido al PDF (ajusta según tus necesidades)
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(40, 10, '¡Hola, este es un PDF generado con FPDF!');

        // Guardar el PDF en el servidor o enviarlo al navegador
        $pdf->Output('output.pdf', 'D');
    }
} catch (Exception $e) {
    // Enviar mensaje de error en la respuesta
    http_response_code(500);
    echo json_encode(array('error' => 'Error al generar el PDF: ' . $e->getMessage()));
    exit;  // Asegúrate de salir del script después de enviar la respuesta de error


}
?>
