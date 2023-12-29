<?php
session_start();
include("../bd/conexion.php");

// Recibir ID de la solicitud
$id_solicitud = isset($_POST['id_solicitud']) ? $_POST['id_solicitud'] : '';

if (empty($id_solicitud)) {
    $response = array('status' => 'error', 'message' => 'ID de solicitud no proporcionado.');
    echo json_encode($response);
    exit; // Detener el script si no se proporciona el ID de solicitud
}

// Verificar si la solicitud existe (opcional, dependiendo de tu lógica de negocio)
$sql_verificar = "SELECT id_solicitud FROM solicitudes WHERE id_solicitud = ?";
$stmt = $conn->prepare($sql_verificar);
$stmt->bind_param("s", $id_solicitud);
$stmt->execute();
$result_verificar = $stmt->get_result();

if ($result_verificar->num_rows > 0) {
    // Actualizar el estado de la solicitud a 'Enviado'
    $sql_actualizar_estado = "UPDATE solicitudes SET estado = 'Verificando' WHERE id_solicitud = ?";
    $stmt = $conn->prepare($sql_actualizar_estado);
    $stmt->bind_param("s", $id_solicitud);
    
    if ($stmt->execute()) {

        $response = array('status' => 'success', 'message' => 'Estado de la solicitud actualizado correctamente.');
    } else {
        $response = array('status' => 'error', 'message' => 'Error al actualizar el estado: ' . $conn->error);
    }
} else {
    $response = array('status' => 'error', 'message' => 'La solicitud no existe.');
}

// Cerrar la conexión y liberar recursos
$stmt->close();
$conn->close();

// Devolver respuesta al cliente en formato JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
