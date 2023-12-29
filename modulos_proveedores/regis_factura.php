<?php
// Inicialización de sesión y conexión
session_start();
include("../bd/conexion.php");  // Asegurarse de que esta inclusión sea correcta

$response = []; // Uso de [] en lugar de array()

// Verificar si existen productos con estado 'Recibido'
$checkSql = "SELECT COUNT(*) as countRecibidos FROM detalle_solicitud WHERE estado = 'Recibido'";
$result = $conn->query($checkSql);
$row = $result->fetch_assoc();

// Verifica si hay productos con estado 'Recibido'
if ($row['countRecibidos'] > 0) {
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
            $updateSql = "UPDATE detalle_solicitud SET estado = 'Facturado' WHERE estado = 'Recibido'";
            
            if ($conn->query($updateSql) === TRUE) {
                $response = [
                    'status' => 'success',
                    'message' => 'FACTURA REGISTRADA Y ESTADO ACTUALIZADO A FACTURADO!'
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Error al actualizar el estado a Facturado: ' . $conn->error
                ];
            }
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Error al registrar la factura: ' . $conn->error
            ];
        }

        // Cerrar declaración preparada
        $stmt->close();
    }
} else {
    $response = [
        'status' => 'error',
        'message' => 'No hay productos en estado "Recibido".'
    ];
}

// Cerrar conexión
$conn->close();

// Enviar respuesta en formato JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
