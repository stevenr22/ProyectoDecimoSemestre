<?php
session_start();
include("../bd/conexion.php");

// Recibir datos del cliente
$id_solicitud = isset($_POST['id_solicitud']) ? $_POST['id_solicitud'] : '';

// Verificar si ya existe un registro con el mismo id_solicitud
$sql_verificar = "SELECT id_solicitudes FROM soli_recibidas WHERE id_solicitudes = '$id_solicitud'";
$result_verificar = $conn->query($sql_verificar);

if ($result_verificar->num_rows > 0) {
    // Ya existe un registro con el mismo id_solicitud
    $response = array('status' => 'error', 'message' => 'Ya se envió esta solicitud, por favor envíe una diferente.');
} else {
    // No existe un registro, realizar la inserción
    $sql_insertar = "INSERT INTO soli_recibidas (id_solicitudes) VALUES ('$id_solicitud')";

    if ($conn->query($sql_insertar) === TRUE) {
        // Después de la inserción, actualiza el estado en la tabla original (solicitudes)
        $sql_actualizar_estado = "UPDATE solicitudes SET estado = 'Enviado' WHERE id_solicitud = '$id_solicitud'";
        $conn->query($sql_actualizar_estado);

        $response = array('status' => 'success', 'message' => 'Datos almacenados correctamente.');
    } else {
        $response = array('status' => 'error', 'message' => 'Error al almacenar datos: ' . $conn->error);
    }
}

// Cerrar conexión
$conn->close();

// Devolver la respuesta al cliente en formato JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
