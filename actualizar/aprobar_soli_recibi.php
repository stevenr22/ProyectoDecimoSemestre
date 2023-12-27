<?php
session_start();
include("../bd/conexion.php");

$id_solicitud = $_POST['id_solicitud'];

$estadoSeleccionado = $_POST['estadoSeleccionado'];

// Corrección de la consulta SQL utilizando CASE
$sql = "UPDATE solicitudes
SET estado = '$estadoSeleccionado', estado = '$estadoSeleccionado'
WHERE id_solicitud = $id_solicitud";


if ($conn->query($sql) === TRUE) {
    $response = array('status' => 'success');
} else {
    $response = array('status' => 'error', 'message' => 'Error al actualizar los datos: ' . $conn->error);
}

$conn->close();

echo json_encode($response);
?>
