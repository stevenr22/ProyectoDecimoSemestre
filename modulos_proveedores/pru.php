<?php
session_start();
include('../bd/conexion.php');  // Asegúrate de incluir tu archivo de conexión

// Obtener el ID o identificador único del archivo PDF (por ejemplo, desde un parámetro GET)
$id_comprobante = 11;

if ($id_comprobante > 0) {
    // Consulta para recuperar el contenido PDF basado en el ID
    $query = "SELECT contenido_pdf FROM comprobante WHERE id_comprobante = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id_comprobante);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Establecer el encabezado para indicar que se va a mostrar un PDF
        header('Content-Type: application/pdf');
        echo $row['contenido_pdf'];  // Mostrar el contenido binario del archivo PDF
    } else {
        echo "Archivo no encontrado.";
    }

    // Cerrar la conexión y detener el script
    $stmt->close();
    $conn->close();
    exit();
} else {
    echo "ID de comprobante no válido.";
}
?>
