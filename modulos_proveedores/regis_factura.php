<?php
session_start();
include("../bd/conexion.php");
date_default_timezone_set("America/Guayaquil");

// Obtener los datos del POST
$fech_emision = $_POST['fech_emision'] ?? '';
$total_fac = $_POST['total_fac'] ?? '';
$valor_insu = $_POST['valor_insu'] ?? '';
$id_solicitud = $_POST['id_solicitud'] ?? '';

if (!empty($fech_emision) && !empty($total_fac) && !empty($valor_insu) && !empty($id_solicitud)) {
    // Preparar la consulta SQL con una sentencia preparada
    $query = "INSERT INTO factura (fecha_emision, valor, total, id_solicitud) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    // Vincular parámetros
    $stmt->bind_param("ssss", $fech_emision, $valor_insu, $total_fac, $id_solicitud);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        $updateSql = "UPDATE detalle_solicitud SET estado = 'Facturado' WHERE estado = 'Recibido' and id_solicitud='$id_solicitud'";
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
            'message' => 'Error al registrar la factura: ' . $stmt->error
        ];
    }

    // Cerrar la sentencia preparada
    $stmt->close();
} else {
    $response = [
        'status' => 'error',
        'message' => 'Todos los campos son requeridos'
    ];
}

// Devolver la respuesta en formato JSON
header('Content-Type: application/json');
echo json_encode($response);

// Cerrar la conexión
$conn->close();
?>
