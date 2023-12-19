<?php
session_start();
include("../bd/conexion.php");

$id_soli_veri = $_POST['id_soli_veri'];
$id_soli_remi = $_POST['id_soli_remi'];
$estadoSeleccionado = $_POST['estadoSeleccionado'];

// Corrección de la consulta SQL utilizando CASE
$sql = "UPDATE soli_recibidas AS sr
JOIN solicitudes AS s ON sr.id_solicitudes = s.id_solicitud
SET sr.estado = '$estadoSeleccionado', s.estado = '$estadoSeleccionado'
WHERE sr.id_soli_reci = $id_soli_veri";


if ($conn->query($sql) === TRUE) {
    $response = array('status' => 'success');
} else {
    $response = array('status' => 'error', 'message' => 'Error al actualizar los datos: ' . $conn->error);
}

$conn->close();

echo json_encode($response);
?>
