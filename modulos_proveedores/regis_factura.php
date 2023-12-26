<?php
// Inicialización de sesión y conexión
session_start();
include("../bd/conexion.php");  // Asegúrate de que esta inclusión sea correcta

$response = []; // Uso de [] en lugar de array()

// Obtener datos del POST y asegurarse de que no estén vacíos
$fech_emision = $_POST['fech_emision'] ?? '';
$total_fac = $_POST['total_fac'] ?? '';

if (empty($fech_emision) || empty($total_fac)) {
    $response = [
        'status' => 'warning',
        'message' => 'CAMPOS VACÍOS!'
    ];
} else {
    // Preparar consulta y ejecutarla
    $sql = "INSERT INTO factura (fecha_emision, total) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $fech_emision, $total_fac);  // Ligando parámetros

    if ($stmt->execute()) {
        $response = [
            'status' => 'success',
            'message' => 'FACTURA REGISTRADA CON ÉXITO!'
        ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Error al registrar la factura: ' . $conn->error
        ];
    }

    // Cerrar declaración preparada
    $stmt->close();
}

// Cerrar conexión
$conn->close();

// Enviar respuesta en formato JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
